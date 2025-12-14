<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Produk'),
        ];
    }

    public function getTitle(): string
    {
        return 'Edit Produk: ' . $this->record->judul;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Handle agen assignment using many-to-many
        if (isset($data['agen_ids'])) {
            $selectedAgenIds = $data['agen_ids'];
            
            // Sync agens with this product (will add/remove as needed)
            $this->record->agens()->sync($selectedAgenIds);
            
            // Remove agen_ids from data as it's not a direct field
            unset($data['agen_ids']);
        }

        return $data;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Produk dan agen berhasil diperbarui!';
    }
}