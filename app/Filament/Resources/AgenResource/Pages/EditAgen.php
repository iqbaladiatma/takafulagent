<?php

namespace App\Filament\Resources\AgenResource\Pages;

use App\Filament\Resources\AgenResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgen extends EditRecord
{
    protected static string $resource = AgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Handle product assignment using many-to-many
        if (isset($data['product_ids'])) {
            $selectedProductIds = $data['product_ids'];
            
            // Sync products with this agent (will add/remove as needed)
            $this->record->products()->sync($selectedProductIds);
            
            // Remove product_ids from data as it's not a direct field
            unset($data['product_ids']);
        }

        return $data;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data agen dan produk berhasil diperbarui!';
    }
}
