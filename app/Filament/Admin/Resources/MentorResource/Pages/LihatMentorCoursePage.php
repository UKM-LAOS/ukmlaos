<?php

namespace App\Filament\Admin\Resources\MentorResource\Pages;

use App\Enums\Course\KategoriEnum;
use App\Filament\Admin\Resources\MentorResource;
use App\Models\Course;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;


class LihatMentorCoursePage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = MentorResource::class;

    protected static string $view = 'filament.admin.resources.mentor-resource.pages.lihat-mentor-course-page';

    public $mentor;

    public function mount()
    {
        $mentor = User::whereHas('roles', fn($query) => $query->where('name', 'mentor'))->find(request()->route('record'));

        if(!$mentor) {
            Notification::make()
                ->title('Gagal')
                ->body('Mentor tidak ditemukan')
                ->danger()
                ->send();

            return redirect()->route('filament.admin.resources.mentors.index');
        }

        $this->mentor = $mentor;

    }

    public function getTitle(): string|Htmlable
    {
        return 'Lihat Course';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->mentor ? Course::query()->with(['media', 'courseMentors', 'courseStudents'])->whereHas('courseMentors', function($query) {
                $query->where('mentor_id', $this->mentor->id);
            }) : Course::query())
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->badge(),
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('course-thumbnail'),
                TextColumn::make('courseStudents')
                    ->label('Enrolled Student')
                    ->getStateUsing(fn(Course $course) => $course->courseStudents->count() . ' Student'),
                TextColumn::make('is_published')
                    ->badge()
                    ->color(fn(Course $course) => $course->is_published ? 'success' : 'warning')
                    ->getStateUsing(fn(Course $course) => $course->is_published ? 'Published' : 'Draft'),
            ]);
    }
}
