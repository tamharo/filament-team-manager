<?php

namespace Manhamprod\FilamentTeamManager\Http\Controllers;

use Illuminate\Http\Request;
use Manhamprod\FilamentTeamManager\Models\TeamInvitation;
use Manhamprod\FilamentTeamManager\Models\User;
use Illuminate\Http\RedirectResponse;

class AcceptInvitationController extends Controller
{
    
    public function __invoke(Request $request, string $token): RedirectResponse
    {

        $routes = config("filament-team-manager.routes.invitation");
        $token = $request->token;
        $invitation = TeamInvitation::firstWhere("token", $token);

        if (! $invitation) {
            return redirect()->route($routes["error"])->with('error', 'Invitation not found.');
        }

        if ($invitation->isExpired()) {
            return redirect()->route($routes["error"])->with('error', 'Invitation expired.');
        }

        $user = User::firstWhere("email", $invitation->email);

        if(!$user){
            $user = $invitation->createInvitedUser();
        }

        if (! $user->teams()->where('team_id', $invitation->team_id)->exists()) {
            $user->teams()->attach($invitation->team_id, [
                'role' => $invitation->role,
            ]);
        }

        $invitation->delete();

        return redirect()->route($routes["success"])->with('success', 'You have joined the team!');

    }

}
