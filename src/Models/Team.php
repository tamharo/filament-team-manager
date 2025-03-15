<?php

namespace Manhamprod\FilamentTeamManager\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{

    use HasFactory, Sluggable;
    
    protected $fillable = [
        'owner_id',
        'name',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'team_user'
        )->withPivot('role')->withTimestamps();
    }

    public function usersCount(): Attribute
    {
        return Attribute::make(
            get: fn(): int => $this->users->count()
        );
    }

    public function invitations()
    {
        return $this->hasMany(TeamInvitation::class);
    }

    public function isOwner($user)
    {
        return $this->owner_id === $user->id;
    }

    public function hasUser($user)
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

}
