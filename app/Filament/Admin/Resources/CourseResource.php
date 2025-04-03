<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Course;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\CourseResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Admin\Resources\CourseResource\RelationManagers;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kategori')
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('keypoints')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->required(),
                Forms\Components\TextInput::make('tipe')
                    ->required(),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\Textarea::make('resource_url')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->badge(),
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('course-thumbnail'),
                TextColumn::make('courseMentors')
                    ->label('Mentor')
                    ->getStateUsing(fn(Course $course) => $course->courseMentors->count() . ' Student'),
                TextColumn::make('courseStudents')
                    ->label('Enrolled Student')
                    ->getStateUsing(fn(Course $course) => $course->courseStudents->count() . ' Student'),
                TextColumn::make('is_published')
                    ->badge()
                    ->color(fn(Course $course) => $course->is_published ? 'success' : 'warning')
                    ->getStateUsing(fn(Course $course) => $course->is_published ? 'Published' : 'Draft'),
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
            'index' => Pages\ManageCourses::route('/'),
        ];
    }
}
