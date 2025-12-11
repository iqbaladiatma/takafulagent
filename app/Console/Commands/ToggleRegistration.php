<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ToggleRegistration extends Command
{
    protected $signature = 'registration:toggle {action : enable or disable}';
    protected $description = 'Enable or disable user registration';

    public function handle()
    {
        $action = $this->argument('action');
        
        if (!in_array($action, ['enable', 'disable'])) {
            $this->error('Action must be either "enable" or "disable"');
            return 1;
        }

        $configPath = config_path('registration.php');
        
        // Create config file if it doesn't exist
        if (!File::exists($configPath)) {
            File::put($configPath, "<?php\n\nreturn [\n    'enabled' => true,\n];\n");
        }

        // Update config
        $enabled = $action === 'enable';
        $configContent = "<?php\n\nreturn [\n    'enabled' => " . ($enabled ? 'true' : 'false') . ",\n];\n";
        File::put($configPath, $configContent);

        // Clear config cache
        $this->call('config:clear');

        $status = $enabled ? 'enabled' : 'disabled';
        $this->info("Registration has been {$status}.");

        return 0;
    }
}