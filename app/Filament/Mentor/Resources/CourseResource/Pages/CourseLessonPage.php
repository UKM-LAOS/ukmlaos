<?php

namespace App\Filament\Mentor\Resources\CourseResource\Pages;

use App\Models\Course;
use Filament\Tables\Table;
use App\Models\CourseChapter;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\Page;
use App\Models\CourseChapterLesson;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Filament\Mentor\Resources\CourseResource;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;

class CourseLessonPage extends Page implements HasTable, HasForms, HasActions
{
    use InteractsWithTable, InteractsWithForms, InteractsWithActions;

    protected static string $resource = CourseResource::class;

    protected static string $view = 'filament.mentor.resources.course-resource.pages.course-lesson-page';

    public function getTitle(): string|Htmlable
    {
        return 'Atur Materi Course';
    }

    public $course;
    public ?array $data = [];

    public function mount()
    {
        $course = Course::find(request()->route('record'));
        if(!$course) {
            Notification::make()
                ->title('Error')
                ->body('Course tidak ditemukan')
                ->danger()
                ->send();

            return redirect()->route('filament.mentor.resources.courses.index');
        }

        $this->course = $course;
        $this->form->fill([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(CourseChapter::query()->with('courseChapterLessons')->whereCourseId($this->course->id))
            ->columns([
                TextColumn::make('judul'),
                TextColumn::make('courseChapterLessons')
                    ->label('Jumlah Materi')
                    ->getStateUsing(fn(CourseChapter $courseChapter) => $courseChapter->courseChapterLessons->count() . ' Materi'),
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('judul')
                            ->required(),
                        Repeater::make('materi')
                            ->relationship('courseChapterLessons')
                            ->schema([
                                TextInput::make('judul')
                                    ->required(),
                                Select::make('tipe_konten')
                                    ->label('Tipe Konten')
                                    ->options([
                                        'video' => 'Video',
                                        'text' => 'Text',
                                    ])
                                    ->live()
                                    ->required(),
                                TextInput::make('youtube_url')
                                    ->required(fn(Get $get) => $get('tipe_konten') === 'video')
                                    ->url()
                                    ->visible(fn(Get $get) => $get('tipe_konten') === 'video'),
                                RichEditor::make('konten')
                                    ->required(fn(Get $get) => $get('tipe_konten') === 'text')
                                    ->visible(fn(Get $get) => $get('tipe_konten') === 'text')
                                    ->columnSpanFull(),
                                Toggle::make('is_terkunci')
                                    ->label('Apakah Materi Terkunci?'),
                            ])
                ]),
                DeleteAction::make(),
            ]);
    }

    public function createMateriAction(): CreateAction
    {
        return CreateAction::make('createMateri')
            ->model(CourseChapter::class)
            ->form([
                Grid::make()
                    ->columns(1)
                    ->schema([
                        Hidden::make('course_id')->default($this->course->id),
                        TextInput::make('judul')
                            ->required(),
                        Repeater::make('materi')
                            ->relationship('courseChapterLessons')
                            ->schema([
                                TextInput::make('judul')
                                    ->required(),
                                Select::make('tipe_konten')
                                    ->label('Tipe Konten')
                                    ->options([
                                        'video' => 'Video',
                                        'text' => 'Text',
                                    ])
                                    ->live()
                                    ->required(),
                                TextInput::make('youtube_url')
                                    ->required(fn(Get $get) => $get('tipe_konten') === 'video')
                                    ->visible(fn(Get $get) => $get('tipe_konten') === 'video')
                                    ->url(),
                                RichEditor::make('konten')
                                    ->required(fn(Get $get) => $get('tipe_konten') === 'text')
                                    ->visible(fn(Get $get) => $get('tipe_konten') === 'text')
                                    ->columnSpanFull(),
                                Toggle::make('is_terkunci')
                                    ->label('Apakah Materi Terkunci?')
                                    ->default(false)
                            ])
                    ])
        ]);
    }
}
