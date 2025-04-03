<?php

namespace App\Filament\Mentor\Resources\CourseResource\Pages;

use Exception;
use Filament\Actions;
use App\Models\Course;
use App\Enums\Course\TipeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Mentor\Resources\CourseResource;

class ManageCourses extends ManageRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->closeModalByClickingAway(false)
                ->using(function (array $data) {
                    DB::beginTransaction();
                    try
                    {
                        // Create the course first
                        $course = Course::create([
                            'judul' => $data['judul'],
                            'kategori' => $data['kategori'],
                            'level' => $data['level'],
                            'deskripsi' => $data['deskripsi'],
                            'tipe' => $data['tipe'],
                            'harga' => $data['tipe'] === TipeEnum::FREE->value ? 0 : $data['harga'],
                            'is_published' => $data['is_published'],
                            'keypoints' => $data['keypoints'],
                            'resource_url' => $data['resource_url'],
                        ]);

                        // Handle media upload if there's a thumbnail
                        if (isset($data['thumbnail'])) {
                            $course->addMedia($data['thumbnail'])->toMediaCollection('course-thumbnail');
                        }

                        // Handle tech stacks relationship
                        if (!empty($data['techStacks'])) {
                            $course->techStacks()->attach($data['techStacks']);
                        }

                        // Get the current authenticated user as the main mentor
                        $mainMentor = Auth::user();

                        // Start with the main mentor
                        $mentorIds = [$mainMentor->id];

                        // If additional mentors were selected, add them to the array
                        if (!empty($data['mentor'])) {
                            $mentorIds = array_merge($mentorIds, $data['mentor']);
                        }

                        // Attach all mentors (main mentor + selected mentors if any)
                        $course->courseMentors()->attach($mentorIds);

                        DB::commit();
                        return $course;
                    }catch(Exception $e)
                    {
                        DB::rollBack();
                        Notification::make()
                            ->title('Error')
                            ->body('Gagal membuat course: ' . $e->getMessage())
                            ->danger()
                            ->send();
                        return;
                    }
                }),
        ];
    }
}
