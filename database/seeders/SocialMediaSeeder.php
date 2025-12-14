<?php

namespace Database\Seeders;

use App\Models\Agen;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing agents with sample social media usernames
        $agents = [
            [
                'nama' => 'Ahmad Fauzi',
                'instagram_username' => 'ahmad.fauzi.agent',
                'facebook_username' => 'ahmad.fauzi.takaful',
                'linkedin_username' => 'ahmad-fauzi-takaful'
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'instagram_username' => 'siti.nurhaliza.agent',
                'facebook_username' => 'siti.nurhaliza.takaful',
                'linkedin_username' => null // Some agents might not have all social media
            ],
            [
                'nama' => 'Demo Agent',
                'instagram_username' => 'demo_agent',
                'facebook_username' => 'demo.agent',
                'linkedin_username' => 'demo-agent'
            ]
        ];

        foreach ($agents as $agentData) {
            $agen = Agen::where('nama', $agentData['nama'])->first();
            if ($agen) {
                $agen->update([
                    'instagram_username' => $agentData['instagram_username'],
                    'facebook_username' => $agentData['facebook_username'],
                    'linkedin_username' => $agentData['linkedin_username'],
                ]);
                
                $this->command->info("Updated social media for: {$agentData['nama']}");
            }
        }
    }
}