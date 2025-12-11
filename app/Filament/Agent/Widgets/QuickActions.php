<?php

namespace App\Filament\Agent\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class QuickActions extends Widget
{
    protected static string $view = 'filament.agent.widgets.quick-actions';

    protected int | string | array $columnSpan = 'full';

    public function getViewData(): array
    {
        $user = Auth::user();
        
        return [
            'user' => $user,
            'agen' => $user ? $user->agen : null,
        ];
    }
}