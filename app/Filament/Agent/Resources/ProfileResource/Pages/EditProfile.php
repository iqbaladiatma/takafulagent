<?php

namespace App\Filament\Agent\Resources\ProfileResource\Pages;

use App\Filament\Agent\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view')
                ->label('Lihat Halaman Profil')
                ->icon('heroicon-o-eye')
                ->color('info')
                ->url(fn (): string => route('agen.show', $this->record->kode_agen))
                ->openUrlInNewTab(),
        ];
    }

    public function getTitle(): string
    {
        return 'Edit Profil: ' . $this->record->nama;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Profil berhasil diperbarui!';
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Pastikan field yang tidak boleh diubah agent tidak tersimpan
        unset($data['kode_agen']);
        unset($data['role']);
        unset($data['pencapaian']);
        unset($data['user_id']);
        
        return $data;
    }
}