<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriMobilResource\Pages;
use App\Filament\Resources\KategoriMobilResource\RelationManagers;
use App\Models\KategoriMobil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class KategoriMobilResource extends Resource
{
protected static ?string $navigationGroup = 'Manajemen Mobil';
protected static ?int $navigationSort = 1;
protected static ?string $navigationLabel = 'Kategori Mobil';
protected static ?string $slug = 'kategori-mobil';




    protected static ?string $model = KategoriMobil::class;

protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([


                Forms\Components\Select::make('nama')
    ->label('Nama Kategori')
    ->options([
        'economy' => 'Economy',
        'compact' => 'Compact',
        'midsize sedan' => 'Midsize / Sedan',
        'suv crossover' => 'SUV / Crossover',
        'mpv family' => 'MPV / Family',
        'premium luxury' => 'Premium / Luxury',
        'pickup commercial' => 'Pickup / Commercial',
    ])
    ->required()
    ->placeholder('Pilih Kategori Mobil')
    ->columnSpanFull(),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(3)
                ->placeholder('Tambahkan deskripsi kategori jika perlu')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                     Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            Tables\Columns\TextColumn::make('nama')
                ->label('Nama Kategori')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50), // membatasi tampilan maksimal 50 karakter
            ])
            ->filters([
                    Tables\Filters\SelectFilter::make('nama')
        ->label('Filter Kategori')
        ->options([
            'large' => 'Large',
            'medium' => 'Medium',
            'small' => 'Small',
        ]),
            ])
            ->actions([
    Tables\Actions\ViewAction::make(),
    Tables\Actions\EditAction::make(),
    Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriMobils::route('/'),
            'create' => Pages\CreateKategoriMobil::route('/create'),
            'edit' => Pages\EditKategoriMobil::route('/{record}/edit'),
        ];
    }
}
