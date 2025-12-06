<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarpoolResource\Pages;
use App\Models\Carpool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class CarpoolResource extends Resource
{
    protected static ?string $model = Carpool::class;
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $navigationGroup = 'Manajemen Car Pool';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Tambah Data Car Pool';
    protected static ?string $slug = 'tambah-data-carpool';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make()
                ->columns(['sm' => 1, 'md' => 2, 'lg' => 3])
                ->schema([
                    TextInput::make('nama_rute')
                        ->label('Nama Rute')
                        ->placeholder('Contoh: Mataram ➜ Senggigi')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn($state, callable $set) =>
                            $set('slug', Str::slug($state))
                        ),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->readOnly()
                            ->unique(ignoreRecord: true)
                            ->columnSpan(1)->placeholder('Otomatis tergenerate ketika memasukkan nama rute'),

                    TextInput::make('tagline')
                        ->label('Tagline')
                        ->placeholder('Contoh: Perjalanan nyaman dan hemat!')
                        ->maxLength(100)
                        ->required(),


                    Select::make('kategori_id')
                        ->label('Kategori Carpool')
                        ->relationship('kategori', 'name')
                        ->required()
                        ->placeholder('Pilih kategori carpool')
                        ->columnSpan(1),

                    TextInput::make('harga_per_kursi')
                        ->label('Harga per Kursi')
                        ->numeric()
                        ->prefix('Rp')
                        ->placeholder('Contoh: 150000')
                        ->required(),

                    TextInput::make('lokasi_awal')
                        ->label('Lokasi Awal')
                        ->placeholder('Contoh: Lombok Airport'),

                    TextInput::make('lokasi_tujuan')
                        ->label('Lokasi Tujuan')
                        ->placeholder('Contoh: Senggigi'),

                    TextInput::make('jam_berangkat')
                        ->label('Jam ')
                        ->placeholder('Contoh: 07:30 atau 07:30 & 15:00 Atau Pagi/Sore')
                        ->nullable(),

                    TextInput::make('rating')
                        ->label('Rating')
                        ->numeric()
                        ->step(0.1)
                        ->minValue(0)
                        ->maxValue(5)
                        ->placeholder('Contoh: 4.5')
                        ->default(0)
                        ->nullable(),

                           TextInput::make('whatsapp')
                        ->label('Nomor WhatsApp')
                        ->placeholder('Contoh: 6281234567890')
                        ->prefixIcon('heroicon-o-phone')
                        ->maxLength(30)
                        ->nullable()
                        ->columnSpan(1),

                 Textarea::make('fitur')
    ->label('Fitur Tambahan')
    ->placeholder("Contoh: AC, Musik Chill, Sopir Lokal")
    ->rows(3)
    ->helperText('Pisahkan setiap fitur dengan koma (,) contoh: AC, WiFi, Sopir Lokal')
    ->columnSpanFull(),


                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(4)
                        ->placeholder('Tulis deskripsi singkat carpool...')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('gambar')
                        ->label('Gambar Carpool')
                        ->directory('carpool')
                        ->disk('public')
                        ->image()
                        ->maxSize(2048)
                        ->preserveFilenames()
                        ->imageEditor()
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('gambar')
                ->label('Gambar')
                ->getStateUsing(fn($record) => asset('storage/' . $record->gambar))
                ->height(70)
                ->width(100),

            Tables\Columns\TextColumn::make('nama_rute')
                ->label('Rute')
                ->searchable()
                ->sortable()
                ->limit(30),

               Tables\Columns\TextColumn::make('kategori.name')
            ->label('Kategori')
            ->sortable()
            ->searchable()
            ->badge()
            ->color(fn($state) => match ($state) {
                'City Route' => 'success',
                'Tour Route' => 'info',
                'Airport Transfer' => 'warning',
                'Private Executive' => 'secondary',
                'Group Shuttle' => 'danger',
                default => 'gray',
            }),

            Tables\Columns\TextColumn::make('harga_per_kursi')
                ->label('Harga per Kursi')
                ->money('IDR', true)
                ->sortable(),

            Tables\Columns\TextColumn::make('jam_berangkat')
                ->label('Jam')
                ->sortable(),

            Tables\Columns\TextColumn::make('rating')
                ->label('Rating')
                ->sortable(),

            Tables\Columns\TextColumn::make('fitur')
                ->label('Fitur')
                ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                ->limit(50),
        ])
        ->filters([
            SelectFilter::make('kategori_id')
                ->relationship('kategori', 'name')
                ->label('Filter Kategori'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()
                ->before(function ($record) {
                    if ($record->gambar && Storage::disk('public')->exists($record->gambar)) {
                        Storage::disk('public')->delete($record->gambar);
                    }
                }),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make()
                    ->before(function ($records) {
                        foreach ($records as $record) {
                            if ($record->gambar && Storage::disk('public')->exists($record->gambar)) {
                                Storage::disk('public')->delete($record->gambar);
                            }
                        }
                    }),
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
            'index' => Pages\ListCarpools::route('/'),
            'create' => Pages\CreateCarpool::route('/create'),
            'edit' => Pages\EditCarpool::route('/{record}/edit'),
        ];
    }
}