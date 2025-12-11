<?php

namespace App\Filament\Agent\Resources;

use App\Filament\Agent\Resources\ProfileResource\Pages;
use App\Models\Agen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProfileResource extends Resource
{
    protected static ?string $model = Agen::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Profil Saya';

    protected static ?string $modelLabel = 'Profil';

    protected static ?string $pluralModelLabel = 'Profil';

    protected static ?string $navigationGroup = 'Kelola Data';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        // Hanya tampilkan profil agen yang sedang login
        $user = Auth::user();
        if ($user && $user->agen) {
            return parent::getEloquentQuery()->where('id', $user->agen->id);
        }
        
        // Jika user tidak memiliki agen, return query kosong
        return parent::getEloquentQuery()->whereRaw('1 = 0');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->description('Beberapa informasi hanya bisa diubah oleh admin')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Lengkap'),

                        Forms\Components\TextInput::make('kode_agen')
                            ->label('Kode Agen')
                            ->helperText('Kode unik agen Anda (tidak dapat diubah)')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\TextInput::make('role')
                            ->label('Role / Posisi')
                            ->helperText('Role Anda (tidak dapat diubah)')
                            ->disabled()
                            ->dehydrated(false),

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
                            ->helperText('Upload foto profil Anda (max 2MB, rasio 1:1)')
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
                    ->description('Upload foto profil dan pilih background untuk halaman profil Anda'),

                Forms\Components\Section::make('Deskripsi')
                    ->schema([
                        Forms\Components\Textarea::make('deskripsi')
                            ->rows(4)
                            ->maxLength(1000)
                            ->label('Deskripsi Singkat')
                            ->helperText('Ceritakan tentang diri Anda'),
                    ]),

                Forms\Components\Section::make('Informasi Tambahan (Hanya Admin)')
                    ->description('Bagian ini hanya dapat diubah oleh administrator')
                    ->schema([
                        Forms\Components\Textarea::make('pencapaian')
                            ->rows(4)
                            ->label('Pencapaian / Pengalaman')
                            ->helperText('Hanya admin yang dapat mengubah bagian ini')
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular()
                    ->size(80)
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

                Tables\Columns\TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Jumlah Produk')
                    ->badge()
                    ->color('primary'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view')
                        ->label('Lihat Halaman Profil')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->url(fn (Agen $record): string => route('agen.show', $record->kode_agen))
                        ->openUrlInNewTab(),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                ])
                ->label('Aksi')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('primary')
                ->button(),
            ])
            ->emptyStateHeading('Profil belum diatur')
            ->emptyStateDescription('Hubungi admin untuk mengatur profil agen Anda.')
            ->emptyStateIcon('heroicon-o-user');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfiles::route('/'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Agent tidak bisa membuat profil baru
    }

    public static function canDelete($record): bool
    {
        return false; // Agent tidak bisa menghapus profil
    }

    public static function canDeleteAny(): bool
    {
        return false; // Agent tidak bisa menghapus profil
    }
}