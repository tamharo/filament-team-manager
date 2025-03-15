<?php

namespace Manhamprod\FilamentTeamManager\Tests\Feature;

use Manhamprod\FilamentTeamManager\Models\Team;
use Manhamprod\FilamentTeamManager\Tests\TestCase;

class TeamTest extends TestCase
{
    public function test_it_creates_a_team(): void
    {
        $team = Team::create([
            'owner_id' => 1,
            'name'     => 'Super Team',
            'slug'     => 'super-team',
        ]);

        $this->assertDatabaseHas('teams', [
            'name' => 'Super Team',
        ]);
    }
}
