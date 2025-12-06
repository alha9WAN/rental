<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MitraResource\Pages;
use App\Models\Mitra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class MitraResource extends Resource
{
    protected static ?string $model = Mitra::class;

    protected static ?string $navigationLabel = 'Data Mitra';
    protected static ?string $navigationGroup = 'Manajemen Mitra';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;

    /* ============================
     * FORM (CREATE & EDIT)
     * ============================ */
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
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukkan nama lengkap '),

                    TextInput::make('alamat')
                        ->label('Alamat')
                        ->maxLength(255)
                        ->placeholder('Contoh: Kuta, Senggigi, Ampenan...'),

                    TextInput::make('no_hp')
                        ->label('Nomor HP / WhatsApp')
                        ->required()
                        ->maxLength(20)
                        ->placeholder('81234567890')
                        ->prefix('+62'),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->nullable()
                        ->placeholder('contoh@mail.com'),

                    TextInput::make('nama_perusahaan')
                        ->label('Nama Perusahaan')
                        ->nullable()
                        ->placeholder('Contoh: Lombok Transport Group'),

                    Select::make('jenis_kendaraan')
                        ->label('Jenis Kendaraan')
                        ->options([
                            'mobil' => 'Mobil',
                            'motor' => 'Motor',
                        ])
                        ->nullable()
                        ->placeholder('Pilih jenis kendaraan'),

                    TextInput::make('nama_kendaraan')
                        ->label('Nama Kendaraan')
                        ->nullable()
                        ->placeholder('Contoh: Avanza, Vario, Beat...'),

                    TextInput::make('harga_sewa')
                        ->label('Harga Sewa')
                        ->numeric()
                        ->prefix('Rp')
                        ->nullable()
                        ->placeholder('Contoh: 150000'),

                    Select::make('status')
                        ->label('Status Mitra')
                        ->options([
                            'Belum Terverifikasi' => 'Belum Terverifikasi',
                            'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                            'Terverifikasi'       => 'Terverifikasi',
                            'Ditolak'             => 'Ditolak',
                        ])
                        ->default('Belum Terverifikasi')
                        ->required()
                        ->native(false)
                        ->placeholder('Pilih status verifikasi'),
                ]),

            // Full width
            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->nullable()
                ->placeholder('Masukkan catatan, fasilitas, syarat sewa, atau informasi tambahan...')
                ->columnSpanFull(),
        ]);
}



    /* ============================
     * TABEL LISTING
     * ============================ */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_perusahaan')
                    ->label('Perusahaan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('No HP')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_kendaraan')
                    ->label('Jenis Kendaraan')
                    ->badge()
                    ->color(fn($state) => $state === 'mobil' ? 'success' : 'warning'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Belum Terverifikasi' => 'gray',
                        'Menunggu Konfirmasi' => 'warning',
                        'Terverifikasi'       => 'success',
                        'Ditolak'             => 'danger',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Daftar Pada')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'Belum Terverifikasi' => 'Belum Terverifikasi',
                        'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                        'Terverifikasi'       => 'Terverifikasi',
                        'Ditolak'             => 'Ditolak',
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

    /* ============================
     * RELATIONS (if any)
     * ============================ */
    public static function getRelations(): array
    {
        return [];
    }

    /* ============================
     * ROUTING PAGES
     * ============================ */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMitras::route('/'),
            'create' => Pages\CreateMitra::route('/create'),
            'edit' => Pages\EditMitra::route('/{record}/edit'),
        ];
    }
}