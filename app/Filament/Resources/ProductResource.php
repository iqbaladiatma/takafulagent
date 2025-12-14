<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Agen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Kelola Produk';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';

    protected static ?string $navigationGroup = 'Manajemen Produk';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->schema([
                        Forms\Components\Placeholder::make('agen_info')
                            ->label('Informasi Agen')
                            ->content('Agen yang bisa menggunakan produk ini dapat dikelola setelah produk dibuat, atau melalui halaman "Kelola Agen" di tabel produk.')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->maxLength(255)
                            ->label('Judul Produk')
                            ->placeholder('Contoh: Asuransi Jiwa Syariah')
                            ->columnSpan(2),

                        Forms\Components\FileUpload::make('gambar')
                            ->image()
                            ->directory('product-images')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '4:3',
                                '16:9',
                            ])
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->label('Gambar Produk')
                            ->helperText('Upload gambar produk (JPG, PNG, WebP - max 2MB). Rasio 1:1 atau 4:3 direkomendasikan.')
                            ->columnSpan(2)
                            ->imagePreviewHeight('200'),

                        Forms\Components\Textarea::make('deskripsi')
                            ->rows(4)
                            ->maxLength(1000)
                            ->label('Deskripsi Produk')
                            ->helperText('Deskripsi lengkap tentang produk')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('urutan')
                            ->numeric()
                            ->default(0)
                            ->label('Urutan Tampil')
                            ->helperText('Angka lebih kecil tampil lebih dulu')
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kelola Agen')
                    ->schema([
                        Forms\Components\CheckboxList::make('agen_ids')
                            ->label('Pilih Agen yang Bisa Menggunakan Produk Ini')
                            ->options(\App\Models\Agen::pluck('nama', 'id')->toArray())
                            ->descriptions(\App\Models\Agen::get()->mapWithKeys(fn($agen) => [$agen->id => $agen->kode_agen . ' - ' . $agen->telepon])->toArray())
                            ->columns(2)
                            ->searchable()
                            ->bulkToggleable()
                            ->helperText('Pilih agen yang bisa menggunakan produk ini. Satu produk bisa digunakan oleh banyak agen.')
                            ->afterStateHydrated(function (Forms\Components\CheckboxList $component, $state, $record) {
                                if ($record) {
                                    $component->state($record->agens->pluck('id')->toArray());
                                }
                            }),

                        Forms\Components\Placeholder::make('current_agens')
                            ->label('Agen Saat Ini')
                            ->content(function ($record) {
                                if (!$record || !$record->agens->count()) {
                                    return 'Belum ada agen yang menggunakan produk ini.';
                                }
                                
                                return $record->agens->map(function ($agen) {
                                    return "• {$agen->nama} ({$agen->kode_agen})";
                                })->join("\n");
                            })
                            ->visible(fn ($record) => $record && $record->agens->count() > 0),
                    ])
                    ->description('Kelola agen yang bisa menggunakan produk ini. Sistem many-to-many memungkinkan satu produk digunakan oleh banyak agen.')
                    ->collapsible()
                    ->collapsed(false)
                    ->icon('heroicon-o-user-group')
                    ->visible(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ViewColumn::make('gambar')
                    ->view('filament.columns.product-image')
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Judul Produk')
                    ->description(fn (Product $record): string => \Str::limit($record->deskripsi, 50)),

                Tables\Columns\TextColumn::make('agens_count')
                    ->counts('agens')
                    ->label('Jumlah Agen')
                    ->badge()
                    ->color('success')
                    ->tooltip('Jumlah agen yang menggunakan produk ini'),

                Tables\Columns\TextColumn::make('agens_names')
                    ->label('Agen yang Menggunakan')
                    ->getStateUsing(function (Product $record): string {
                        $agenNames = $record->agens->pluck('nama')->take(3)->toArray();
                        if (count($agenNames) === 0) {
                            return 'Belum ada agen';
                        }
                        $display = implode(', ', $agenNames);
                        if ($record->agens->count() > 3) {
                            $display .= ' +' . ($record->agens->count() - 3) . ' lainnya';
                        }
                        return $display;
                    })
                    ->tooltip(function (Product $record): string {
                        return $record->agens->pluck('nama')->implode(', ') ?: 'Belum ada agen yang menggunakan produk ini';
                    })
                    ->toggleable()
                    ->searchable(false)
                    ->sortable(false),

                Tables\Columns\TextColumn::make('urutan')
                    ->sortable()
                    ->label('Urutan')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->label('Dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('agen_filter')
                    ->label('Filter Agen')
                    ->options(\App\Models\Agen::pluck('nama', 'id')->toArray())
                    ->query(function ($query, array $data) {
                        if (!empty($data['value'])) {
                            $query->whereHas('agens', function ($q) use ($data) {
                                $q->where('agen_id', $data['value']);
                            });
                        }
                    })
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('has_agen')
                    ->label('Dengan Agen')
                    ->query(fn ($query) => $query->whereHas('agens')),
                Tables\Filters\Filter::make('no_agen')
                    ->label('Tanpa Agen')
                    ->query(fn ($query) => $query->whereDoesntHave('agens')),
                Tables\Filters\Filter::make('has_image')
                    ->label('Dengan Gambar')
                    ->query(fn ($query) => $query->whereNotNull('gambar')),
                Tables\Filters\Filter::make('no_image')
                    ->label('Tanpa Gambar')
                    ->query(fn ($query) => $query->whereNull('gambar')),
                Tables\Filters\Filter::make('created_this_month')
                    ->label('Bulan Ini')
                    ->query(fn ($query) => $query->whereMonth('created_at', now()->month)),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view_agens')
                        ->label('Lihat Agen yang Menggunakan')
                        ->icon('heroicon-o-users')
                        ->color('info')
                        ->modalHeading(fn (Product $record): string => 'Agen yang Menggunakan: ' . $record->judul)
                        ->modalContent(fn (Product $record): \Illuminate\Contracts\View\View => view('filament.modals.product-agens', ['product' => $record]))
                        ->modalSubmitAction(false)
                        ->modalCancelActionLabel('Tutup')
                        ->visible(fn (Product $record): bool => $record->agens->count() > 0),
                    Tables\Actions\Action::make('manage_agens')
                        ->label('Kelola Agen')
                        ->icon('heroicon-o-user-group')
                        ->color('warning')
                        ->form([
                            Forms\Components\CheckboxList::make('agen_ids')
                                ->label('Pilih Agen yang Bisa Menggunakan Produk Ini')
                                ->options(\App\Models\Agen::pluck('nama', 'id')->toArray())
                                ->descriptions(\App\Models\Agen::get()->mapWithKeys(fn($agen) => [$agen->id => $agen->kode_agen . ' - ' . $agen->telepon])->toArray())
                                ->columns(2)
                                ->searchable()
                                ->bulkToggleable(),
                        ])
                        ->fillForm(fn (Product $record): array => [
                            'agen_ids' => $record->agens->pluck('id')->toArray(),
                        ])
                        ->action(function (array $data, Product $record): void {
                            $record->agens()->sync($data['agen_ids'] ?? []);
                        })
                        ->modalHeading(fn (Product $record): string => 'Kelola Agen untuk: ' . $record->judul)
                        ->modalSubmitActionLabel('Simpan')
                        ->successNotificationTitle('Agen berhasil diperbarui'),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->label('Aksi')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('primary')
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn ($query) => $query->with('agens'))
            ->emptyStateHeading('Belum ada produk')
            ->emptyStateDescription('Mulai dengan menambahkan produk pertama.')
            ->emptyStateIcon('heroicon-o-shopping-bag')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Produk Pertama')
                    ->icon('heroicon-o-plus'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}