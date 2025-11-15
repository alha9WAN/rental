<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MobilResource\Pages;
use App\Filament\Resources\MobilResource\RelationManagers;
use App\Models\Mobil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


// use tambahan
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Textarea;
    use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;




class MobilResource extends Resource
{

    protected static ?string $navigationGroup = 'Manajemen Mobil';
protected static ?int $navigationSort = 2;
protected static ?string $navigationLabel = 'Tambah Data Mobil';

protected static ?string $slug = 'tambah-data-mobil';


    protected static ?string $model = Mobil::class;

protected static ?string $navigationIcon = 'heroicon-o-plus-circle';


   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Grid::make()
                ->columns([
                    'sm' => 1, // 1 kolom di layar kecil
                    'md' => 2, // 2 kolom di layar sedang
                    'lg' => 3, // 3 kolom di layar besar
                ])
                ->schema([

                     TextInput::make('nama')->label('Nama Mobil')
                        ->required()
                        ->maxLength(255)->reactive()
                        ->afterStateUpdated(function ($state, callable $set, $get) {
                            if (! $get('id') || ! $get('slug')) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }
                        })->placeholder('Contoh: Xpander'),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->placeholder('Otomatis tergenerate ketika memasukkan nama mobil')
                        ->readOnly()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->columnSpan(1),

                    TextInput::make('tagline')
                        ->label('Tagline')
                        ->placeholder('Contoh: Perjalanan nyaman dan hemat!')
                        ->maxLength(100)
                        ->required(),

                    Select::make('kategori_id')
                        ->label('Kategori Mobil')
                        ->relationship('mobilKategori', 'nama')
                        ->required()
                        ->placeholder('Pilih kategori mobil')
                        ->columnSpan(1),

                    Select::make('tipe')
                        ->label('Tipe Mobil')
                        ->options([
                            'MPV' => 'MPV',
                            'City Car' => 'City Car',
                            'SUV' => 'SUV',
                        ])
                        ->required()
                        ->placeholder('Pilih tipe mobil')
                        ->columnSpan(1),

                              Select::make('status')
                        ->label('Status Mobil')
                        ->options([
                            'tersedia' => 'Tersedia',
                            'disewa' => 'Disewa',
                        ])
                        ->default('tersedia')
                        ->required()
                        ->columnSpan(1),

                    TextInput::make('harga_per_hari')
                        ->label('Harga per Hari')
                        ->numeric()
                        ->required()
                        ->prefix('Rp')
                        ->placeholder('Contoh: 250000')
                        ->columnSpan(1),

                    TextInput::make('kursi')
                        ->label('Jumlah Kursi')
                        ->numeric()
                        ->placeholder('Contoh: 8')
                        ->required()
                        ->columnSpan(1),

                    TextInput::make('rating')
                        ->label('Rating')
                        ->numeric()
                        ->step(0.1)
                        ->minValue(0)
                        ->maxValue(5)
                        ->placeholder('Contoh: 4 atau 4.5')
                        ->columnSpan(1),



                    TextInput::make('lokasi')
                        ->label('Lokasi')
                        ->placeholder('Contoh: Lombok')
                        ->nullable()
                        ->columnSpan(1),


                        Select::make('inisial_vendor')
                        ->label('Inisial Vendor')
                        ->options([
                            'PT' => 'PT',
                            'LR' => 'LR',
                            'RT' => 'RT',
                            'LA' => 'LA',
                        ])
                        ->placeholder('Pilih inisial vendor')
                        ->nullable()
                        ->columnSpan(1),

                    TextInput::make('vendor')
                        ->label('Nama Vendor')
                        ->placeholder('Contoh: Lombok Rent Car')
                        ->nullable()
                        ->columnSpan(1),



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
                        ->label('Deskripsi Mobil')
                        ->placeholder('Tuliskan detail singkat tentang mobil, fitur, atau kondisi...')
                        ->rows(5)
                        ->nullable()
                        ->columnSpanFull(),


                 FileUpload::make('gambar')
    ->label('Gambar Mobil')
    ->directory('mobil')
    ->disk('public')
    ->image()
    ->maxSize(2048)
    ->preserveFilenames()
    ->required()->columnSpanFull()->imageEditor()->placeholder('Upload gambar voucher (maks 2MB)')


                ]),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

Tables\Columns\ImageColumn::make('gambar')
    ->label('Gambar')
    ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar))
    ->height(70)
    ->width(100),






       Tables\Columns\TextColumn::make('nama')
                ->label('Nama Mobil')
                ->searchable()
                ->sortable()
                ->limit(30),


                 Tables\Columns\TextColumn::make('harga_per_hari')
                ->label('Harga per Hari')
                ->money('IDR', true) // format uang (Rp)
                ->sortable(),


                   Tables\Columns\TextColumn::make('mobilKategori.nama')
                ->label('Kategori')
                ->sortable()
                ->searchable(),


                      Tables\Columns\TextColumn::make('tipe')
                ->label('Tipe')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'MPV' => 'success',
                    'City Car' => 'info',
                    'SUV' => 'warning',
                    default => 'gray',
                })
                ->sortable(),

                      Tables\Columns\TextColumn::make('status')
                ->label('Status Mobil')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'tersedia' => 'success',
                    'disewa' => 'warning',
                    default => 'gray',
                })
                ->sortable(),

            ])
            ->filters([

SelectFilter::make('tipe')
    ->label('Filter Tipe Mobil')
    ->options([
        'MPV' => 'MPV',
        'City Car' => 'City Car',
        'SUV' => 'SUV',
    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),    // Tombol Lihat / Show
    Tables\Actions\EditAction::make(),    // Tombol Edit
      Tables\Actions\DeleteAction::make()   // Tombol Hapus
        ->before(function ($record) {
            // Hapus gambar sebelum record dihapus
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMobils::route('/'),
            'create' => Pages\CreateMobil::route('/create'),
            'edit' => Pages\EditMobil::route('/{record}/edit'),
        ];
    }
}
