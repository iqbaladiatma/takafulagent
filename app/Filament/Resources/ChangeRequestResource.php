<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChangeRequestResource\Pages;
use App\Models\ChangeRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ChangeRequestResource extends Resource
{
    protected static ?string $model = ChangeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Request Perubahan';

    protected static ?string $modelLabel = 'Request';

    protected static ?string $pluralModelLabel = 'Request Perubahan';

    protected static ?string $navigationGroup = 'Manajemen Request';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Request')
                    ->schema([
                        Forms\Components\Select::make('agen_id')
                            ->relationship('agen', 'nama')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->label('Agen'),

                        Forms\Components\Select::make('type')
                            ->options([
                                'profile' => 'Perubahan Profil',
                                'product_add' => 'Tambah Produk',
                                'product_edit' => 'Edit Produk',
                                'product_delete' => 'Hapus Produk',
                            ])
                            ->disabled()
                            ->label('Jenis Request'),

                        Forms\Components\TextInput::make('title')
                            ->disabled()
                            ->label('Judul'),

                        Forms\Components\Textarea::make('description')
                            ->disabled()
                            ->rows(4)
                            ->label('Deskripsi'),

                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'judul')
                            ->disabled()
                            ->label('Produk Terkait')
                            ->visible(fn ($record) => $record && in_array($record->type, ['product_edit', 'product_delete'])),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Review Admin')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Menunggu',
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                            ])
                            ->required()
                            ->label('Status'),

                        Forms\Components\Textarea::make('admin_notes')
                            ->rows(4)
                            ->label('Catatan Admin')
                            ->helperText('Berikan catatan untuk agen tentang keputusan ini'),

                        Forms\Components\Hidden::make('approved_by')
                            ->default(fn () => Auth::id()),

                        Forms\Components\Hidden::make('approved_at')
                            ->default(fn () => now()),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('agen.nama')
                    ->searchable()
                    ->sortable()
                    ->label('Agen')
                    ->description(fn (ChangeRequest $record): string => $record->agen->kode_agen),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Judul')
                    ->description(fn (ChangeRequest $record): string => \Str::limit($record->description, 50)),

                Tables\Columns\BadgeColumn::make('type')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'profile' => 'Profil',
                        'product_add' => 'Tambah Produk',
                        'product_edit' => 'Edit Produk',
                        'product_delete' => 'Hapus Produk',
                    })
                    ->colors([
                        'primary' => 'profile',
                        'success' => 'product_add',
                        'warning' => 'product_edit',
                        'danger' => 'product_delete',
                    ])
                    ->label('Jenis'),

                Tables\Columns\TextColumn::make('product.judul')
                    ->label('Produk')
                    ->toggleable()
                    ->placeholder('-'),

                Tables\Columns\BadgeColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    })
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->label('Status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->label('Dibuat'),

                Tables\Columns\TextColumn::make('approvedBy.name')
                    ->label('Diproses oleh')
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ])
                    ->label('Status'),

                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'profile' => 'Perubahan Profil',
                        'product_add' => 'Tambah Produk',
                        'product_edit' => 'Edit Produk',
                        'product_delete' => 'Hapus Produk',
                    ])
                    ->label('Jenis'),

                Tables\Filters\SelectFilter::make('agen_id')
                    ->relationship('agen', 'nama')
                    ->searchable()
                    ->preload()
                    ->label('Agen'),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('view_agent')
                        ->label('Lihat Agen')
                        ->icon('heroicon-o-user')
                        ->color('info')
                        ->url(fn (ChangeRequest $record): string => route('agen.show', $record->agen->kode_agen))
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
            ->emptyStateHeading('Belum ada request')
            ->emptyStateDescription('Request perubahan dari agen akan muncul di sini.')
            ->emptyStateIcon('heroicon-o-clipboard-document-list');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChangeRequests::route('/'),
            'edit' => Pages\EditChangeRequest::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}