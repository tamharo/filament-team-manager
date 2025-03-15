<?php

namespace Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource;

class CreateTeamInvitation extends CreateRecord
{
    protected static string $resource = TeamInvitationResource::class;

    protected function handleRecordCreation(array $data): Model
    {

        $data["expires_at"] = Carbon::now()->addDays(2);

        $invitation = static::getModel()::create($data);
        $mail = config("filament-team-manager.mail.invitation.class");

        Mail::to($invitation->email)->send(new $mail($invitation));

        return $invitation;

    }

}
