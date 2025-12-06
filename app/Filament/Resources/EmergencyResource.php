<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmergencyResource\Pages;
use App\Models\Emergency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmergencyResource extends Resource
{
    protected static ?string $model = Emergency::class;

    protected static ?string $navigationLabel = 'Data Emergency';
    protected static ?string $navigationGroup = 'Manajemen Emergency';
    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns([
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 3,
                ])->schema([

// Di dalam schema form
TextInput::make('unique_id')
    ->label('ID Unik')
    ->readOnly()
    ->default(fn () => 'LRH-' . date('Ymd') . '-' . strtoupper(Str::random(5)))
    ->placeholder('Otomatis terisi'),


                    TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukkan nama lengkap'),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->nullable()
                        ->placeholder('contoh@mail.com')->required(),

                    TextInput::make('phone')
                        ->label('No HP / WhatsApp')
                        ->required()
                        ->maxLength(20)
                        ->prefix('+62')
                        ->placeholder('81234567890'),

                    TextInput::make('nationality')
                        ->label('Kebangsaan')

                        ->maxLength(50)
                        ->placeholder('Contoh: Indonesia'),

                    TextInput::make('location')
                        ->label('Lokasi Darurat')
                        ->required()
                        ->placeholder('Contoh: Kuta, Bali'),

                    Select::make('urgency')
                        ->label('Tingkat Darurat')
                        ->options([
                            'low' => 'LOW - Response within 24 hours',
                            'medium' => 'MEDIUM - Need assistance within 6-12 hours',
                            'high' => 'HIGH - Need assistance within 1-6 hours',
                            'emergency' => 'EMERGENCY - Need immediate assistance (5-15 minutes)',
                        ])
                        ->required()
                        ->placeholder('-- Select Urgency Level --'),

                    Select::make('language')
                        ->label('Bahasa')
                        ->options([
                            'indonesia' => 'Indonesian',
                            'english' => 'English',
                            'mandarin' => 'Mandarin',
                            'japanese' => 'Japanese',
                            'korean' => 'Korean',
                            'arabic' => 'Arabic',
                            'french' => 'French',
                            'german' => 'German',
                            'spanish' => 'Spanish',
                            'other' => 'Other Language',
                        ])
                        ->required()
                        ->placeholder('-- Select Language --'),

                    CheckboxList::make('assistance_type')
                        ->label('Type of Assistance Needed')
                        ->options([
                            'medical' => 'Medical',
                            'transport' => 'Transportation',
                            'document' => 'Documents',
                            'communication' => 'Communication',
                            'accommodation' => 'Accommodation',
                            'other' => 'Other',
                        ])
                        ->required(),

                ]),

           TextInput::make('people_count')
    ->label('Jumlah Orang')
    ->numeric()
    ->default(1)
    ->required()
    ->columnSpanFull(),

Textarea::make('description')
    ->label('Deskripsi')
    ->rows(4)
    ->required()
    ->placeholder('Informasi tambahan mengenai keadaan darurat...')
    ->columnSpanFull(),

TextInput::make('total_payment')
    ->label('Total Pembayaran')
    ->prefix('Rp')
    ->numeric()
    ->required()
    ->columnSpanFull(),

FileUpload::make('payment_proof')
    ->label('Bukti Pembayaran')
    ->required() // wajib diisi
    ->image()
    ->directory('payment_proofs')
    ->maxSize(2048)
    ->columnSpanFull()
    ->imageEditor()
    ->helperText('Upload bukti pembayaran berupa gambar'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unique_id')->label('ID')->sortable(),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('phone')->label('No HP'),
                TextColumn::make('nationality')->label('Kebangsaan'),
                TextColumn::make('location')->label('Lokasi'),
Tables\Columns\TextColumn::make('urgency')
    ->label('Urgensi')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'low' => 'success',       // hijau
        'medium' => 'warning',    // kuning
        'high' => 'danger',       // merah
        'emergency' => 'primary', // biru
        default => 'gray',
    })
    ->sortable(),

Tables\Columns\TextColumn::make('language')
    ->label('Bahasa')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'indonesia' => 'success',
        'english' => 'primary',
        'mandarin' => 'warning',
        'japanese' => 'info',
        'korean' => 'secondary',
        'arabic' => 'danger',
        'french' => 'secondary',
        'german' => 'gray',
        'spanish' => 'warning',
        'other' => 'dark',
        default => 'gray',
    }),
                TextColumn::make('people_count')->label('Jumlah Orang'),
                TextColumn::make('total_payment')->label('Total Bayar')->prefix('Rp'),

               Tables\Columns\ImageColumn::make('payment_proof')
    ->label('Bukti Pembayaran')
    ->getStateUsing(fn ($record) => asset('storage/' . $record->payment_proof))
    ->height(70)
    ->width(100)->extraAttributes([
        'class' => 'rounded-lg object-cover', // rounded dan menjaga proporsi
    ]),


                TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('urgency')
                    ->label('Filter Urgensi')
                    ->options([
                        'low' => 'LOW',
                        'medium' => 'MEDIUM',
                        'high' => 'HIGH',
                        'emergency' => 'EMERGENCY',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        if ($record->payment_proof && Storage::disk('public')->exists($record->payment_proof)) {
                            Storage::disk('public')->delete($record->payment_proof);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                if ($record->payment_proof && Storage::disk('public')->exists($record->payment_proof)) {
                                    Storage::disk('public')->delete($record->payment_proof);
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
            'index' => Pages\ListEmergencies::route('/'),
            'create' => Pages\CreateEmergency::route('/create'),
            'edit' => Pages\EditEmergency::route('/{record}/edit'),
        ];
    }
}