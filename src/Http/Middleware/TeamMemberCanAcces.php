<?php

namespace Manhamprod\FilamentTeamManager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeamMemberCanAcces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if(!$user->isInTeam()){
            return redirect()->route(config("filament-team-manager.routes.home"))->with("error", "Access denied to this section");
        }

        return $next($request);

    }
}
