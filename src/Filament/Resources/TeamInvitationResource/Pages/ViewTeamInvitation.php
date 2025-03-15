<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource\Pages;

use Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTeamInvitation extends ViewRecord
{
    protected static string $resource = TeamInvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
