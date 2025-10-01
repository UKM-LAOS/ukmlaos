<?php

namespace App\Filament\Admin\Resources\PengurusResource\Pages;

use App\Filament\Admin\Resources\PengurusResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePenguruses extends ManageRecords
{
    protected static string $resource = PengurusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->closeModalByClickingAway(false)
                ->modalWidth('3xl'),
        ];
    }
}
