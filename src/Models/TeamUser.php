<?php

namespace Manhamprod\FilamentTeamManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamUser extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_id',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
