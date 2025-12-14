<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    public function getTitle(): string
    {
        return 'Tambah Produk Baru';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Store agen_ids for later use
        $this->agenIds = $data['agen_ids'] ?? [];
        
        // Remove agen_ids from data as it's not a direct field
        unset($data['agen_ids']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Handle agen assignment after product is created using many-to-many
        if (!empty($this->agenIds)) {
            $this->record->agens()->sync($this->agenIds);
        }
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Produk berhasil ditambahkan dan agen telah ditetapkan!';
    }

    protected $agenIds = [];
}