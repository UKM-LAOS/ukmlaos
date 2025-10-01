<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PengurusResource\Pages\ManagePenguruses;
use App\Models\Pengurus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pengurus';
    protected static ?string $pluralLabel = 'Pengurus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengurus')
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->label('Nama Lengkap')
                            ->maxLength(255),

                        TextInput::make('jabatan')
                            ->required()
                            ->label('Jabatan')
                            ->maxLength(255)
                            ->placeholder('Contoh: Ketua Umum, Sekretaris, dll'),

                        TextInput::make('periode')
                            ->required()
                            ->label('Periode')
                            ->placeholder('Contoh: 2024-2025')
                            ->maxLength(255),

                        TextInput::make('urutan')
                            ->numeric()
                            ->label('Urutan')
                            ->default(0)
                            ->helperText('Urutan tampilan (semakin kecil semakin di atas)')
                            ->minValue(0),

                        Toggle::make('aktif')
                            ->label('Status Aktif')
                            ->default(true)
                            ->helperText('Hanya pengurus aktif yang akan ditampilkan'),
                    ])
                    ->columns(2),

                Section::make('Foto Pengurus')
                    ->schema([
                        FileUpload::make('foto')
                            ->image()
                            ->directory('pengurus-photos')
                            ->getUploadedFileNameForStorageUsing(
                                fn(\Illuminate\Http\UploadedFile $file): string =>
                                Str::uuid() . '.' . $file->getClientOriginalExtension()
                            )
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ])
                            ->label('Upload Foto')
                            ->helperText('Ukuran maksimal 2MB. Disarankan rasio 1:1 (persegi)'),
                    ])
                    ->collapsible(),

                Section::make('Media Sosial')
                    ->schema([
                        TextInput::make('sosmed.instagram')
                            ->label('Instagram')
                            ->url()
                            ->placeholder('https://instagram.com/username')
                            ->prefixIcon('heroicon-o-camera'),

                        TextInput::make('sosmed.facebook')
                            ->label('Facebook')
                            ->url()
                            ->placeholder('https://facebook.com/username')
                            ->prefixIcon('heroicon-o-users'),

                        TextInput::make('sosmed.github')
                            ->label('GitHub')
                            ->url()
                            ->placeholder('https://github.com/username')
                            ->prefixIcon('heroicon-o-code-bracket'),

                        TextInput::make('sosmed.linkedin')
                            ->label('LinkedIn')
                            ->url()
                            ->placeholder('https://linkedin.com/in/username')
                            ->prefixIcon('heroicon-o-briefcase'),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->disk('public')
                    ->size(50)
                    ->circular()
                    ->defaultImageUrl(url('/logo.png')),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('periode')
                    ->label('Periode')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),

                IconColumn::make('aktif')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('periode')
                    ->label('Periode')
                    ->options(function () {
                        return \App\Models\Pengurus::select('periode')
                            ->distinct()
                            ->orderBy('periode', 'desc')
                            ->pluck('periode', 'periode');
                    }),

                Tables\Filters\TernaryFilter::make('aktif')
                    ->label('Status Aktif')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('aktivkan')
                        ->label('Aktifkan')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each->update(['aktif' => true]);
                        })
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('nonaktifkan')
                        ->label('Nonaktifkan')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records) {
                            $records->each->update(['aktif' => false]);
                        })
                        ->deselectRecordsAfterCompletion(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePenguruses::route('/'),
        ];
    }
}
