<?php

namespace Manhamprod\FilamentTeamManager\Traits;

use Manhamprod\FilamentTeamManager\Models\Team;

trait HasTeams
{

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function isInTeam(): bool
    {
        return $this->teams()->where('teams.is_active', true)->orWhere("owner_id", $this->id)->exists();
    }
    
}
