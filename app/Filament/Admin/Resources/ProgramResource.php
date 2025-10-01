<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Program;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Dotswan\MapPicker\Fields\Map;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\ProgramResource\Pages;
use App\Filament\Admin\Resources\ProgramResource\RelationManagers;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Program';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Detail Program')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('divisi_id')
                            ->required()
                            ->label('Divisi')
                            ->relationship('divisi', 'nama')
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('judul_program')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                if ($state) {
                                    $set('slug', str($state)->slug());
                                }
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->readOnly()
                            ->dehydrated(),
                        Forms\Components\TextInput::make('judul_kegiatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->required()
                            ->maxFiles(1)
                            ->optimize('webp')
                            ->image()
                            ->maxSize(1024)
                            ->label('Thumbnail (Max 1 file, Max 1MB)')
                            ->collection('program-thumbnail'),
                        Forms\Components\RichEditor::make('konten')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Fieldset::make('Waktu Pendaftaran & Tempat')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\DatePicker::make('open_regis_panitia')
                                    ->required()
                                    ->label('Tanggal Pembukaan Pendaftaran Panitia')
                                    ->native(false)
                                    ->displayFormat('d/m/Y'),
                                Forms\Components\DatePicker::make('close_regis_panitia')
                                    ->required()
                                    ->label('Tanggal Penutupan Pendaftaran Panitia')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->after('open_regis_panitia'),
                            ]),
                        Forms\Components\TextInput::make('gform_panitia')
                            ->required()
                            ->url()
                            ->label('Link Google Form Panitia')
                            ->placeholder('https://forms.gle/xxxxx')
                            ->columnSpanFull(),
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\DatePicker::make('open_regis_peserta')
                                    ->required()
                                    ->label('Tanggal Pembukaan Pendaftaran Peserta')
                                    ->native(false)
                                    ->displayFormat('d/m/Y'),
                                Forms\Components\DatePicker::make('close_regis_peserta')
                                    ->required()
                                    ->label('Tanggal Penutupan Pendaftaran Peserta')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->after('open_regis_peserta'),
                            ]),
                        Forms\Components\TextInput::make('gform_peserta')
                            ->required()
                            ->url()
                            ->label('Link Google Form Peserta')
                            ->placeholder('https://forms.gle/xxxxx')
                            ->columnSpanFull(),
                        Map::make('location')
                            ->label('Lokasi Kegiatan')
                            ->defaultLocation(latitude: -8.165516031480806, longitude: 113.71727423131937)
                            ->afterStateUpdated(function (Set $set, ?array $state): void {
                                $set('lat', $state['lat']);
                                $set('long', $state['lng']);
                            })
                            ->afterStateHydrated(function ($state, $record, Set $set): void {
                                $set(
                                    'location',
                                    [
                                        'lat' => $record->lat ?? -8.165516031480806,
                                        'lng' => $record->long ?? 113.71727423131937,
                                    ]
                                );
                            })
                            ->liveLocation(true, true, 5000)
                            ->showMarker()
                            ->markerColor("#22c55eff")
                            ->showFullscreenControl()
                            ->showZoomControl()
                            ->draggable()
                            ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                            ->zoom(15)
                            ->detectRetina()
                            ->showMyLocationButton()
                            ->extraTileControl([])
                            ->extraControl([
                                'zoomDelta' => 1,
                                'zoomSnap' => 2,
                            ]),
                        Forms\Components\TextInput::make('lat')
                            ->required()
                            ->live()
                            ->numeric()
                            ->readOnly()
                            ->label('Latitude'),
                        Forms\Components\TextInput::make('long')
                            ->required()
                            ->live()
                            ->numeric()
                            ->readOnly()
                            ->label('Longitude'),
                        Forms\Components\TextInput::make('location_name')
                            ->label('Nama Lokasi (Opsional)')
                            ->maxLength(255)
                            ->placeholder('Contoh: Gedung Ilmu Komputer')
                            ->helperText('Kosongkan untuk menggunakan nama dari koordinat'),
                        Forms\Components\Textarea::make('location_address')
                            ->label('Alamat Lokasi (Opsional)')
                            ->rows(2)
                            ->placeholder('Contoh: Jl. Kalimantan No.37, Jember')
                            ->helperText('Kosongkan untuk menggunakan alamat dari koordinat'),
                    ]),
                Forms\Components\Fieldset::make('Jadwal Kegiatan')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Repeater::make('jadwal_kegiatan')
                            ->required()
                            ->schema([
                                Forms\Components\TextInput::make('jadwal')
                                    ->required()
                                    ->label('Nama Kegiatan')
                                    ->placeholder('Contoh: Pembukaan')
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('waktu')
                                    ->required()
                                    ->label('Tanggal')
                                    ->native(false)
                                    ->displayFormat('d/m/Y'),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel('Tambah Jadwal')
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->itemLabel(fn(array $state): ?string => $state['jadwal'] ?? 'Jadwal'),
                    ]),
                Forms\Components\Fieldset::make('Dokumentasi')
                    ->columns(1)
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('dokumentasi')
                            ->multiple()
                            ->image()
                            ->optimize('webp')
                            ->maxSize(2048)
                            ->maxFiles(10)
                            ->label('Dokumentasi (Optional, Max 10 files)')
                            ->helperText('Upload foto dokumentasi kegiatan')
                            ->collection('program-dokumentasi')
                            ->reorderable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('divisi.nama')
                    ->label('Divisi')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('judul_program')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
                            return null;
                        }
                        return $state;
                    }),
                Tables\Columns\TextColumn::make('judul_kegiatan')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('program-thumbnail')
                    ->collection('program-thumbnail')
                    ->label('Thumbnail')
                    ->circular(),
                Tables\Columns\TextColumn::make('open_regis_peserta')
                    ->label('Pendaftaran Peserta')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('status_pendaftaran')
                    ->label('Status')
                    ->state(function (Program $record): bool {
                        $now = now();
                        return $now->between($record->open_regis_peserta, $record->close_regis_peserta);
                    })
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('divisi')
                    ->relationship('divisi', 'nama')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePrograms::route('/'),
        ];
    }
}
