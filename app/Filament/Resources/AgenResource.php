<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgenResource\Pages;
use App\Models\Agen;
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

    protected static ?string $navigationLabel = 'Agen Takaful';

    protected static ?string $modelLabel = 'Agen';

    protected static ?string $pluralModelLabel = 'Agen';

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

                Forms\Components\Section::make('Foto Profil')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('agen-photos')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->maxSize(2048)
                            ->label('Foto Agen')
                            ->helperText('Upload foto profil agen (max 2MB, rasio 1:1)'),
                    ]),

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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular()
                    ->defaultImageUrl(asset('images/default-avatar.png'))
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('kode_agen')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success')
                    ->label('Kode Agen'),

                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->label('Role'),

                Tables\Columns\TextColumn::make('telepon')
                    ->searchable()
                    ->label('Telepon'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->label('Dibuat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Lihat Halaman')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Agen $record): string => route('agen.show', $record->kode_agen))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
