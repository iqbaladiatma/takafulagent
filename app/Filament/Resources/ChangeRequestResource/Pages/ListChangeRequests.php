<?php

namespace App\Filament\Resources\ChangeRequestResource\Pages;

use App\Filament\Resources\ChangeRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChangeRequests extends ListRecords
{
    protected static string $resource = ChangeRequestResource::class;

    public function getTitle(): string
    {
        return 'Request Perubahan';
    }

    protected function getHeaderActions(): array
    {
        return [
            // No create action - requests are created by agents
        ];
    }
}