<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriVoucherResource\Pages;
use App\Models\KategoriVoucher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriVoucherResource extends Resource
{
    protected static ?string $model = KategoriVoucher::class;
    protected static ?string $navigationGroup = 'Manajemen Voucher';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kategori Voucher';
    protected static ?string $slug = 'kategori-voucher';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
  Forms\Components\Select::make('nama')
    ->label('Nama Kategori')
    ->options([
        'Toko Souvenir' => 'Toko Souvenir',
        'Super Market' => 'Super Market',
        'Spa' => 'Spa',
        'Salon Barber' => 'Salon Barber',
        'Restaurant' => 'Restaurant',
    ])
    ->required()
    ->placeholder('Pilih Kategori Voucher')
    ->columnSpanFull(),


                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->nullable()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])

                ->filters([
                Tables\Filters\SelectFilter::make('nama')
                    ->label('Filter Kategori')
                    ->options([
                        'restoran' => 'Restoran',
                        'hotel' => 'Hotel',
                        'lainnya' => 'Lainnya',
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriVouchers::route('/'),
            'create' => Pages\CreateKategoriVoucher::route('/create'),
            'edit' => Pages\EditKategoriVoucher::route('/{record}/edit'),
        ];
    }
}
