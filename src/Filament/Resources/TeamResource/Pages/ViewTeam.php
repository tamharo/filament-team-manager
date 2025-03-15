<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource\Pages;

use Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
