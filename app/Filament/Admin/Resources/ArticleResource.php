<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Article\KategoriEnum;
use App\Filament\Admin\Resources\ArticleResource\Pages;
use App\Filament\Admin\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('division_id')
                            ->label('Divisi')
                            ->required()
                            ->relationship('division', 'nama'),
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->label('Thumbnail (Max. 1 file, 1 MB)')
                            ->required()
                            ->image()
                            ->collection('article-thumbnail')
                            ->optimize('webp')
                            ->maxFiles(1)
                            ->maxSize(1024),
                        Forms\Components\Select::make('kategori')
                            ->required()
                            ->options([
                                KategoriEnum::INFORMASI->value => KategoriEnum::INFORMASI->label(),
                                KategoriEnum::TUTORIAL->value => KategoriEnum::TUTORIAL->label(),
                                KategoriEnum::MITOS_FAKTA->value => KategoriEnum::MITOS_FAKTA->label(),
                                KategoriEnum::TIPS_TRIK->value => KategoriEnum::TIPS_TRIK->label(),
                                KategoriEnum::PRESS_RELEASE->value => KategoriEnum::PRESS_RELEASE->label(),
                            ]),
                        Forms\Components\RichEditor::make('konten')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_unggulan')
                            ->label('Apakah merupakan artikel unggulan?')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('division.nama')
                    ->label('Divisi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('article-thumbnail'),
                Tables\Columns\TextColumn::make('kategori')
                    ->badge()
                    ->getStateUsing(fn(Article $article) => $article->kategori->label()),
                Tables\Columns\ToggleColumn::make('is_unggulan')
                    ->label('Artikel Unggulan'),
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
                //
            ])
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
            'index' => Pages\ManageArticles::route('/'),
        ];
    }
}
