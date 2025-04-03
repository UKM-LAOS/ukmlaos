<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\MentorResource\Pages;
use App\Filament\Admin\Resources\MentorResource\RelationManagers;

class MentorResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Mentor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('mentor')
                            ->options(User::whereHas('roles', function (Builder $query) {
                                $query->where('name', 'student');
                            })->get()->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),
                        // Forms\Components\Select::make('roles')
                        //     ->relationship('roles', 'name')
                        //     ->default('mentor')
                        //     ->label('Peran')
                        //     ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::query()->with('mentorCourses')->whereHas('roles', function (Builder $query) {
                $query->where('name', 'mentor');
            }))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Mentor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('profil')
                    ->getStateUsing(fn(User $user) => $user->avatar_url),
                Tables\Columns\TextColumn::make('mentorCourses')
                    ->label('Jumlah Course')
                    ->getStateUsing(fn(User $user) => $user->mentorCourses->count() . ' Course'),
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
                Tables\Actions\Action::make('lihatCourse')
                    ->label('Lihat Course')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn(User $user) => Pages\LihatMentorCoursePage::getUrl(['record' => $user])),
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
            'index' => Pages\ManageMentors::route('/'),
            'course' => Pages\LihatMentorCoursePage::route('/{record}/course'),
        ];
    }
}
