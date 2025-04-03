<?php

namespace App\Filament\Mentor\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Course;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\Course\TipeEnum;
use App\Enums\Course\LevelEnum;
use Filament\Resources\Resource;
use App\Enums\Course\KategoriEnum;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Mentor\Resources\CourseResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Mentor\Resources\CourseResource\RelationManagers;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Detail Course')
                    ->columns(1)
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('kategori')
                            ->required()
                            ->options([
                                // 'programming' => 'Programming',
                                // 'cyber-security' => 'Cyber Security',
                                // 'design' => 'Design',
                                // 'digital-marketing' => 'Digital Marketing',
                                KategoriEnum::PROGRAMMING->value => KategoriEnum::PROGRAMMING->label(),
                                KategoriEnum::CYBER_SECURITY->value => KategoriEnum::CYBER_SECURITY->label(),
                                KategoriEnum::DESIGN->value => KategoriEnum::DESIGN->label(),
                                KategoriEnum::DIGITAL_MARKETING->value => KategoriEnum::DIGITAL_MARKETING->label(),
                            ]),
                        Forms\Components\Select::make('mentor')
                            ->label('Mentor (Opsional. Pilih mentor yang akan diajak berkolaborasi. Jika tidak ada, maka Anda akan menjadi mentor utama)')
                            ->relationship('courseMentors', 'name', function (Builder $query) {
                                $query->whereHas('roles', function (Builder $query) {
                                    $query->where('name', 'mentor');
                                })
                                ->whereNot('id', auth()->id());
                            })
                            ->multiple()
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('techStacks')
                            ->label('Tech Stack')
                            ->required()
                            ->relationship('techStacks', 'nama')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('nama')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                Forms\Components\SpatieMediaLibraryFileUpload::make('tech-stack-thumbnail')
                                    ->collection('tech-stack-thumbnail')
                                    ->required()
                                    ->optimize('webp')
                                    ->image()
                                    ->maxFiles(1)
                                    ->maxSize(1024),
                            ]),
                        Forms\Components\Select::make('level')
                            ->required()
                            ->options([
                                LevelEnum::BEGINNER->value => LevelEnum::BEGINNER->label(),
                                LevelEnum::INTERMEDIATE->value => LevelEnum::INTERMEDIATE->label(),
                                LevelEnum::ADVANCED->value => LevelEnum::ADVANCED->label(),
                            ]),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('course-thumbnail')
                            ->required()
                            ->optimize('webp')
                            ->image()
                            ->maxFiles(1)
                            ->maxSize(1024),
                        Forms\Components\RichEditor::make('deskripsi')
                            ->required(),
                        Forms\Components\TextInput::make('resource_url')
                            ->label('Resource URL')
                            ->required()
                            ->url(),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Siap Publish')
                            ->default(false),
                    ]),

                Forms\Components\Fieldset::make('Key Points')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Repeater::make('keypoints')
                            ->schema([
                                Forms\Components\TextInput::make('point')
                                    ->required(),
                            ])
                            ->required(),
                    ]),
                Forms\Components\Fieldset::make('Pricing')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('tipe')
                            ->required()
                            ->options([
                                TipeEnum::FREE->value => TipeEnum::FREE->label(),
                                TipeEnum::PREMIUM->value => TipeEnum::PREMIUM->label(),
                            ])
                            ->default('free')
                            ->afterStateUpdated(fn(Set $set, string $state) => $state === TipeEnum::FREE->value ? $set('harga', 0) : null)
                            ->live(),
                        Forms\Components\TextInput::make('harga')
                            ->required()
                            ->default(0)
                            ->minValue(1)
                            ->prefix('Rp')
                            ->suffix('.00')
                            ->live()
                            ->visible(fn(Get $get) => $get('tipe') === 'premium')
                            ->required(fn(Get $get) => $get('tipe') === 'premium'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->getStateUsing(fn(Course $course) => $course->kategori->label())
                    ->badge(),
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('course-thumbnail'),
                TextColumn::make('courseMentors')
                    ->label('Mentor')
                    ->getStateUsing(fn(Course $course) => $course->courseMentors->count() . ' Mentor'),
                TextColumn::make('courseStudents')
                    ->label('Enrolled Student')
                    ->getStateUsing(fn(Course $course) => $course->courseStudents->count() . ' Student'),
                TextColumn::make('harga')
                    ->weight(FontWeight::Bold)
                    ->money('IDR'),
                ToggleColumn::make('is_published')
                    ->label('Terpublish'),
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
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn(Course $course) => route('course.show', $course->slug))
                    ->openUrlInNewTab()
                    ->color('warning'),
                Tables\Actions\Action::make('materi')
                    ->label('Atur Materi')
                    ->icon('heroicon-o-document-text')
                    ->color('info')
                    ->url(fn(Course $course) => Pages\CourseLessonPage::getUrl(['record' => $course->id])),
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function(array $data)
                    {
                        if($data['tipe'] === TipeEnum::FREE->value)
                        {
                            $data['harga'] = 0;
                        }
                        return $data;
                    }),
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
            'pelajaran' => Pages\CourseLessonPage::route('/{record}/pelajaran'),
        ];
    }
}
