<?php

namespace App\Filament\Resources\ChangeRequestResource\Pages;

use App\Filament\Resources\ChangeRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChangeRequest extends EditRecord
{
    protected static string $resource = ChangeRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Review Request: ' . $this->record->title;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Request berhasil diproses!';
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['status'] !== 'pending') {
            $data['approved_at'] = now();
            $data['approved_by'] = auth()->id();
        }

        return $data;
    }
}