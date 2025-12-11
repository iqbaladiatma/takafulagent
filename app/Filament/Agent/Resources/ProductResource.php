<?php

namespace App\Filament\Agent\Resources;

use App\Filament\Agent\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Agen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Produk Saya';

    protected static ?string $modelLabel = 'Produk';

    protected static ?string $pluralModelLabel = 'Produk';

    protected static ?string $navigationGroup = 'Kelola Data';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        // Hanya tampilkan produk milik agen yang sedang login
        $user = Auth::user();
        if ($user && $user->agen) {
            return parent::getEloquentQuery()->where('agen_id', $user->agen->id);
        }
        
        // Jika user tidak memiliki agen, return query kosong
        return parent::getEloquentQuery()->whereRaw('1 = 0');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Produk')
                    ->schema([
                        Forms\Components\Hidden::make('agen_id')
                            ->default(function () {
                                $user = Auth::user();
                                return $user && $user->agen ? $user->agen->id : null;
                            }),

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
                            ->maxSize(2048)
                            ->label('Gambar Produk')
                            ->helperText('Upload gambar produk (max 2MB)')
                            ->columnSpan(2),

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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->size(60)
                    ->defaultImageUrl(asset('images/default-product.png'))
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Judul Produk')
                    ->description(fn (Product $record): string => \Str::limit($record->deskripsi, 50)),

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

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->label('Diperbarui')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan', 'asc')
            ->filters([
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
                    Tables\Actions\Action::make('preview')
                        ->label('Lihat di Halaman Profil')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->url(fn (Product $record): string => route('agen.show', $record->agen->kode_agen))
                        ->openUrlInNewTab(),
                    Tables\Actions\Action::make('whatsapp')
                        ->label('Test WhatsApp Link')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->color('success')
                        ->url(fn (Product $record): string => $record->wa_link)
                        ->openUrlInNewTab(),
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
            ->emptyStateHeading('Belum ada produk')
            ->emptyStateDescription('Mulai dengan menambahkan produk pertama Anda.')
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

    public static function canCreate(): bool
    {
        // Pastikan user memiliki agen profile
        $user = Auth::user();
        return $user && $user->agen;
    }
}