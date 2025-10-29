<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriMotorResource\Pages;
use App\Filament\Resources\KategoriMotorResource\RelationManagers;
use App\Models\KategoriMotor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriMotorResource extends Resource
{
    protected static ?string $model = KategoriMotor::class;
    protected static ?string $navigationGroup = 'Manajemen Motor';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Kategori Motor';
    protected static ?string $slug = 'kategori-motor';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nama')
                    ->label('Nama Kategori')
                    ->options([
                        'large' => 'Large',
                        'medium' => 'Medium',
                        'small' => 'Small',
                    ])
                    ->required()
                    ->placeholder('Pilih Kategori Motor')->columnSpanFull(),

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
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi')->limit(50)->columnSpanFull(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriMotors::route('/'),
            'create' => Pages\CreateKategoriMotor::route('/create'),
            'edit' => Pages\EditKategoriMotor::route('/{record}/edit'),
        ];
    }
}
