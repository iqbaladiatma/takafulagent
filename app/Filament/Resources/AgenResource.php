<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgenResource\Pages;
use App\Models\Agen;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AgenResource extends Resource
{
    protected static ?string $model = Agen::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Kelola Agen';

    protected static ?string $modelLabel = 'Agen';

    protected static ?string $pluralModelLabel = 'Agen';

    protected static ?string $navigationGroup = 'Manajemen Agen';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Agen')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Lengkap'),

                        Forms\Components\TextInput::make('kode_agen')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->label('Kode Agen')
                            ->helperText('Contoh: TKF001, AGN123')
                            ->alphaDash(),

                        Forms\Components\TextInput::make('role')
                            ->default('Agen Takaful')
                            ->maxLength(255)
                            ->label('Role / Posisi'),

                        Forms\Components\TextInput::make('telepon')
                            ->required()
                            ->tel()
                            ->maxLength(255)
                            ->label('Nomor Telepon')
                            ->helperText('Format: 08123456789 atau +628123456789')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Auto-generate WA link
                                $phone = preg_replace('/[^0-9]/', '', $state);
                                if (substr($phone, 0, 1) === '0') {
                                    $phone = '62' . substr($phone, 1);
                                }
                                $set('wa_link', 'https://wa.me/' . $phone);
                            }),

                        Forms\Components\TextInput::make('wa_link')
                            ->url()
                            ->maxLength(255)
                            ->label('Link WhatsApp')
                            ->helperText('Otomatis terisi dari nomor telepon'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Foto Profil & Background')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('agen-photos')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->maxSize(2048)
                            ->label('Foto Profil')
                            ->helperText('Upload foto profil agen (max 2MB, rasio 1:1)')
                            ->columnSpan(1),

                        Forms\Components\Select::make('background_type')
                            ->label('Tipe Background')
                            ->options([
                                'gradient' => 'Gradient (Pilihan Warna)',
                                'image' => 'Upload Gambar Custom',
                            ])
                            ->default('gradient')
                            ->reactive()
                            ->columnSpan(1),

                        Forms\Components\Select::make('background_value')
                            ->label('Pilih Gradient')
                            ->options([
                                'blue-green' => '🔵 Biru → Hijau (Default)',
                                'blue-purple' => '🔵 Biru → Ungu',
                                'green-teal' => '🟢 Hijau → Teal',
                                'orange-red' => '🟠 Orange → Merah',
                                'pink-purple' => '🌸 Pink → Ungu',
                                'yellow-orange' => '🟡 Kuning → Orange',
                            ])
                            ->default('blue-green')
                            ->visible(fn ($get) => $get('background_type') === 'gradient')
                            ->columnSpan(1),

                        Forms\Components\FileUpload::make('background_image')
                            ->image()
                            ->directory('agen-backgrounds')
                            ->imageEditor()
                            ->maxSize(3072)
                            ->label('Upload Background Image')
                            ->helperText('Upload gambar background (max 3MB, recommended 1200x400px)')
                            ->visible(fn ($get) => $get('background_type') === 'image')
                            ->columnSpan(2),
                    ])
                    ->columns(2)
                    ->description('Upload foto profil dan pilih background untuk halaman profil agen'),

                Forms\Components\Section::make('Deskripsi & Pencapaian')
                    ->schema([
                        Forms\Components\Textarea::make('deskripsi')
                            ->rows(4)
                            ->maxLength(1000)
                            ->label('Deskripsi Singkat')
                            ->helperText('Ceritakan tentang agen ini'),

                        Forms\Components\Textarea::make('pencapaian')
                            ->rows(4)
                            ->maxLength(1000)
                            ->label('Pencapaian / Pengalaman')
                            ->helperText('Opsional: Prestasi atau pengalaman agen'),
                    ]),

                Forms\Components\Section::make('Produk Agen')
                    ->schema([
                        Forms\Components\Repeater::make('products')
                            ->relationship()
                            ->schema([
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
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->label('Deskripsi Produk')
                                    ->helperText('Deskripsi singkat tentang produk')
                                    ->columnSpan(2),

                                Forms\Components\TextInput::make('urutan')
                                    ->numeric()
                                    ->default(0)
                                    ->label('Urutan Tampil')
                                    ->helperText('Angka lebih kecil tampil lebih dulu')
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->addActionLabel('+ Tambah Produk')
                            ->reorderable()
                            ->collapsible()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['judul'] ?? 'Produk Baru')
                            ->cloneable()
                            ->deleteAction(
                                fn ($action) => $action->requiresConfirmation()
                            ),
                    ])
                    ->description('Tambahkan produk-produk yang ditawarkan oleh agen ini. Klik "Tambah Produk" untuk menambahkan produk baru.')
                    ->collapsible()
                    ->collapsed(false)
                    ->icon('heroicon-o-shopping-bag'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular()
                    ->size(60)
                    ->defaultImageUrl(fn($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->nama) . '&size=200&background=3b82f6&color=fff')
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Nama Lengkap')
                    ->description(fn (Agen $record): string => $record->role),

                Tables\Columns\TextColumn::make('kode_agen')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->icon('heroicon-o-identification')
                    ->label('Kode Agen'),

                Tables\Columns\TextColumn::make('telepon')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->copyable()
                    ->copyMessage('Nomor telepon disalin!')
                    ->label('Telepon'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->tooltip(fn (Agen $record): ?string => $record->deskripsi)
                    ->label('Deskripsi')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->label('Dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('has_photo')
                    ->label('Dengan Foto')
                    ->query(fn ($query) => $query->whereNotNull('foto')),
                Tables\Filters\Filter::make('no_photo')
                    ->label('Tanpa Foto')
                    ->query(fn ($query) => $query->whereNull('foto')),
                Tables\Filters\Filter::make('created_this_month')
                    ->label('Bulan Ini')
                    ->query(fn ($query) => $query->whereMonth('created_at', now()->month)),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view')
                        ->label('Lihat Halaman')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->url(fn (Agen $record): string => route('agen.show', $record->kode_agen))
                        ->openUrlInNewTab(),
                    Tables\Actions\Action::make('whatsapp')
                        ->label('Chat WhatsApp')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->color('success')
                        ->url(fn (Agen $record): string => $record->wa_link)
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
            ->emptyStateHeading('Belum ada agen')
            ->emptyStateDescription('Mulai dengan menambahkan agen pertama Anda.')
            ->emptyStateIcon('heroicon-o-user-group')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Agen Pertama')
                    ->icon('heroicon-o-plus'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgens::route('/'),
            'create' => Pages\CreateAgen::route('/create'),
            'edit' => Pages\EditAgen::route('/{record}/edit'),
        ];
    }
}
