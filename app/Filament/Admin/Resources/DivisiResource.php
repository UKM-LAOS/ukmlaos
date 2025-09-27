<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DivisiResource\Pages;
use App\Filament\Admin\Resources\DivisiResource\RelationManagers;
use App\Models\Divisi;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DivisiResource extends Resource
{
    protected static ?string $model = Divisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Divisi';

    public static function form(Form $form): Form
    {
       return $form
            ->schema([
                Section::make('Informasi Divisi')
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->label('Nama Divisi')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Logo Divisi')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->directory('divisi-logos')
                            ->getUploadedFileNameForStorageUsing(
                            fn (\Illuminate\Http\UploadedFile $file): string =>
                                Str::uuid() . '.' . $file->getClientOriginalExtension()
    )
                            ->maxSize(2048)
                            ->label('Upload Logo'),
                    ])
                    ->collapsible(),
            ]);
    }

     public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->disk('public')
                    ->size(50)
                    ->circular()
                    ->default('/logo.png'),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Divisi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),


                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageDivisis::route('/'),
        ];
    }
}
