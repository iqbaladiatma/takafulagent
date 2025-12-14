<?php

namespace App\Filament\Resources\AgenResource\Pages;

use App\Filament\Resources\AgenResource;
use App\Models\Product;
use Filament\Resources\Pages\CreateRecord;

class CreateAgen extends CreateRecord
{
    protected static string $resource = AgenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Store product_ids for later use
        $this->productIds = $data['product_ids'] ?? [];
        
        // Remove product_ids from data as it's not a direct field
        unset($data['product_ids']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Handle product assignment after agen is created using many-to-many
        if (!empty($this->productIds)) {
            $this->record->products()->sync($this->productIds);
        }
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Agen berhasil dibuat dan produk telah ditetapkan!';
    }

    protected $productIds = [];
}
