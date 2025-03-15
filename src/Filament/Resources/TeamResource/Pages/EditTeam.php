<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource\Pages;

use Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
