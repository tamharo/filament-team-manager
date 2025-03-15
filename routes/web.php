<?php

use Illuminate\Support\Facades\Route;
use Manhamprod\FilamentTeamManager\Http\Controllers\AcceptInvitationController;

Route::name("validate-team-invitation")->get("/validate-team-invitation/{token}", AcceptInvitationController::class);
