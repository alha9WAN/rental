<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Models\Voucher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ImageColumn;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;
    protected static ?string $navigationGroup = 'Manajemen Voucher';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Tambah Voucher';
    protected static ?string $slug = 'tambah-voucher';
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';

    public static function form(Form $form): Form
    {
        return $form
               ->schema([
            Forms\Components\Grid::make()
                ->columns([
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 3,
                ])
                ->schema([
                    TextInput::make('nama')
                        ->label('Nama Voucher')
                        ->placeholder('Contoh: Voucher Hotel 10%')
                        ->required()
                        ->maxLength(255)    ->reactive()
                        ->afterStateUpdated(function ($state, callable $set, $get) {
                            if (! $get('id') || ! $get('slug')) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }
                        }),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->placeholder('Otomatis tergenerate ketika memasukkan nama voucher')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->readOnly(),

                    Select::make('kategori_id')
                        ->label('Kategori Voucher')
                        ->relationship('kategoriVoucher', 'nama')
                        ->placeholder('Pilih kategori voucher')
                        ->required(),

                    TextInput::make('diskon')
                        ->label('Diskon (%)')
                        ->placeholder('Contoh: 10.5 atau 30')
                        ->nullable(),

                        DatePicker::make('berlaku_hingga')
                        ->label('Berlaku Hingga')
                        ->placeholder('Pilih tanggal berlaku voucher')
                        ->nullable(),

                                            Select::make('status')
                        ->label('Status Voucher')
                        ->options([
                            'aktif' => 'Aktif',
                            'kadaluarsa' => 'Kadaluarsa',
                        ])
                        ->default('aktif')
                        ->placeholder('Pilih status voucher'),

                    TextInput::make('whatsapp')
                        ->label('Nomor WhatsApp')
                        ->placeholder('Contoh: 6281234567890')
                        ->prefixIcon('heroicon-o-phone')
                        ->maxLength(30)
                        ->nullable()->columnSpanFull(),





                    Textarea::make('deskripsi')
                        ->label('Deskripsi Voucher')
                        ->placeholder('Tuliskan deskripsi singkat voucher, syarat, atau ketentuan...')
                        ->rows(4)
                        ->columnSpanFull()
                        ->nullable(),

                    FileUpload::make('gambar')
                        ->label('Gambar Voucher')
                        ->directory('voucher')
                        ->disk('public')
                        ->placeholder('Upload gambar voucher (maks 2MB)')
                        ->image()
                        ->maxSize(2048)
                        ->preserveFilenames()
                        ->imageEditor()
                        ->columnSpanFull()
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')->label('Gambar')->getStateUsing(fn($record) => $record->gambar ? asset('storage/' . $record->gambar) : null)->height(70)->width(100),
                Tables\Columns\TextColumn::make('nama')->label('Nama Voucher')->searchable()->sortable()->limit(30),
                Tables\Columns\TextColumn::make('kategoriVoucher.nama')->label('Kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('diskon')->label('Diskon (%)')->sortable(),
                Tables\Columns\TextColumn::make('berlaku_hingga')->label('Berlaku Hingga')->sortable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->badge()->color(fn (string $state): string => match($state){
                    'aktif' => 'success',
                    'kadaluarsa' => 'danger',
                    default => 'gray',
                })->sortable(),
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
                Tables\Actions\DeleteBulkAction::make()->before(function ($records) {
                    foreach ($records as $record) {
                        if ($record->gambar && Storage::disk('public')->exists($record->gambar)) {
                            Storage::disk('public')->delete($record->gambar);
                        }
                    }
                }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVouchers::route('/'),
            'create' => Pages\CreateVoucher::route('/create'),
            'edit' => Pages\EditVoucher::route('/{record}/edit'),
        ];
    }
}
