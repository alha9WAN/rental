<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriCarpoolResource\Pages;
use App\Models\KategoriCarpool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriCarpoolResource extends Resource
{
    protected static ?string $model = KategoriCarpool::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Car Pool';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Kategori Car Pool';
    protected static ?string $slug = 'kategori-carpool';

    public static function form(Form $form): Form
    {
        return $form->schema([
           Forms\Components\Select::make('name')
    ->label('Nama Kategori')
    ->options([
        'city route' => 'City Route',
        'tour route' => 'Tour Route',
        'airport transfer' => 'Airport Transfer',
        'private executive' => 'Private/Executive',
        'group shuttle' => 'Group/Shuttle',
    ])
    ->required()
    ->placeholder('Pilih Jenis Kategori Carpool')
    ->columnSpanFull(),


            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(3)->placeholder('Tambahkan deskripsi kategori jika perlu')->columnSpanFull(),

        ]);
    }

    public static function table(Table $table): Table
    {
    return $table
            ->columns([
                     Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            Tables\Columns\TextColumn::make('name')
                ->label('Nama Kategori')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50), // membatasi tampilan maksimal 50 karakter
            ])
            ->filters([
                    Tables\Filters\SelectFilter::make('name')
        ->label('Filter Kategori')
        ->options([
           'city route' => 'City Route',
        'tour route' => 'Tour Route',
        'airport transfer' => 'Airport Transfer',
        'private executive' => 'Private/Executive',
        'group shuttle' => 'Group/Shuttle',
        ]),
                  ])
            ->actions([
    Tables\Actions\ViewAction::make(),
    Tables\Actions\EditAction::make(),
    Tables\Actions\DeleteAction::make(),

        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriCarpools::route('/'),
            'create' => Pages\CreateKategoriCarpool::route('/create'),
            'edit' => Pages\EditKategoriCarpool::route('/{record}/edit'),
        ];
    }
}