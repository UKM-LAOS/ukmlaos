<?php

namespace App\Filament\Admin\Resources\MentorResource\Pages;

use App\Models\User;
use Filament\Actions;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Admin\Resources\MentorResource;

class ManageMentors extends ManageRecords
{
    protected static string $resource = MentorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Mentor')
                ->using(function(User $user, array $data)
                {
                    $user = User::find($data['mentor']);
                    
                    $user->syncRoles(['mentor', 'student']);
                })
                ->closeModalByClickingAway(false),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Mentor';
    }
}
