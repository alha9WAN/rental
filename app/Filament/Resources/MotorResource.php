<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotorResource\Pages;
use App\Models\Motor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Storage;

class MotorResource extends Resource
{
    protected static ?string $model = Motor::class;
    protected static ?string $navigationGroup = 'Manajemen Motor';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Tambah Data Motor';
    protected static ?string $slug = 'tambah-data-motor';
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(['sm' => 1, 'md' => 2, 'lg' => 3])
                    ->schema([
                        TextInput::make('nama')->label('Nama Motor')
                        ->required()
                        ->maxLength(255)     ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, $get) {
                            if (! $get('id') || ! $get('slug')) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }
                        })->placeholder('Contoh: Vario-160'),


                        TextInput::make('slug')->
                        label('Slug')
                        ->required()->
                        unique(ignoreRecord: true)->maxLength(255)->placeholder('Otomatis tergenerate ketika memasukkan nama motor')->readOnly(),
                           TextInput::make('tagline')
                       ->label('Tagline')
                       ->placeholder('Contoh: Perjalanan nyaman dan hemat!')
                       ->maxLength(100)
                       ->required(),


                        Select::make('kategori_id')->
                        label('Kategori Motor')->
                        relationship('kategoriMotor', 'nama')
                        ->required() ->placeholder('Pilih kategori motor'),


                        Select::make('tipe')->label('Tipe Motor')->options([
                            'Skutik' => 'Skutik',
                            'Sport' => 'Sport',
                            'Bebek' => 'Bebek',
                            'Listrik' => 'Listrik',
                        ])->required()->placeholder('Pilih tipe motor'),

                Select::make('status')->label('Status')->options([
                            'tersedia' => 'Tersedia',
                            'disewa' => 'Disewa',
                        ])->default('tersedia'),

                        TextInput::make('harga_per_hari')
                        ->label('Harga per Hari')
                        ->numeric()
                        ->required()
                        ->prefix('Rp')->placeholder('Contoh: 250000'),



                        TextInput::make('bahan_bakar')->
                        label('Bahan Bakar (L)')
                        ->numeric()->nullable()->placeholder('Contoh : 45 atau 30'),


                        TextInput::make('rating')->
                        label('Rating')->
                        numeric()->
                        step(0.1)->minValue(0)->
                        maxValue(5)->nullable()->placeholder('Contoh: 4 atau 4.5')
,





                        TextInput::make('lokasi')->
                        label('Lokasi')
                        ->nullable()->placeholder('Contoh: Lombok'),



                           Select::make('inisial_vendor')->label('Inisial Vendor')->options([
                            'PT' => 'PT',
                            'LR' => 'LR',
                            'RT' => 'RT',
                            'LA' => 'LA',
                        ])->nullable()->placeholder('Pilih inisial vendor'),


                        TextInput::make('vendor')
                        ->label('Nama Vendor')
                        ->nullable()->placeholder('Contoh: Lombok Rental'),






                    TextInput::make('whatsapp')
                        ->label('Nomor WhatsApp')
                        ->placeholder('Contoh: 6281234567890')
                        ->prefixIcon('heroicon-o-phone')
                        ->maxLength(30)
                        ->nullable()
                        ->columnSpan(1),

                          Textarea::make('fitur')
   ->label('Fitur Tambahan')
   ->placeholder("Contoh: BBM Irit, Helem,GPS")
   ->rows(3)
   ->helperText('Pisahkan setiap fitur dengan koma (,) contoh: BBM Irit, Helem,GPS')
   ->columnSpanFull(),

                        Textarea::make('deskripsi')->
                        label('Deskripsi')
                        ->rows(5)
                        ->nullable()
                        ->columnSpanFull()->placeholder('Tuliskan detail singkat tentang motor, fitur, atau kondisi...'),


                        FileUpload::make('gambar')
                        ->label('Gambar Motor')
                        ->directory('motor')
                        ->disk('public')
                        ->image()
                        ->maxSize(2048)
                        ->preserveFilenames()
                        ->required()
                        ->columnSpanFull()->imageEditor()->placeholder('Upload gambar voucher (maks 2MB)'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')->label('Gambar')->getStateUsing(fn($record) => asset('storage/' . $record->gambar))->height(70)->width(100),
                Tables\Columns\TextColumn::make('nama')->label('Nama Motor')->searchable()->sortable()->wrap(),
                Tables\Columns\TextColumn::make('harga_per_hari')->label('Harga per Hari')->money('IDR', true)->sortable(),
                Tables\Columns\TextColumn::make('kategoriMotor.nama')->label('Kategori')->sortable()->searchable(),
  Tables\Columns\TextColumn::make('tipe')
        ->label('Tipe')
        ->badge()
        ->color(fn (string $state): string => match ($state) {
            'Skutik' => 'success',
            'Sport' => 'info',
            'Bebek' => 'warning',
            'Listrik' => 'primary',
            default => 'gray',
        })
        ->sortable(),

    Tables\Columns\TextColumn::make('status')
        ->label('Status')
        ->badge()
        ->color(fn (string $state): string => match ($state) {
            'tersedia' => 'success',
            'disewa' => 'warning',
            default => 'gray',
        })
        ->sortable(),            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')->options([
                    'Skutik' => 'Skutik',
                    'Sport' => 'Sport',
                    'Bebek' => 'Bebek',
                    'Listrik' => 'Listrik',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->before(function ($record) {
                    if ($record->gambar && Storage::disk('public')->exists($record->gambar)) {
                        Storage::disk('public')->delete($record->gambar);
                    }
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->before(function ($records) {
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
            'index' => Pages\ListMotors::route('/'),
            'create' => Pages\CreateMotor::route('/create'),
            'edit' => Pages\EditMotor::route('/{record}/edit'),
        ];
    }
}
