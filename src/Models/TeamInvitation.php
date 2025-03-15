<?php

namespace Manhamprod\FilamentTeamManager\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'email',
        'name',
        'role',
        'token',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function expired(): Attribute
    {
        return Attribute::make(
            get: fn(): bool => $this->isExpired()
        );
    }

    public function createInvitedUser()
    {

        $password = Str::random(8);

        $user = User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $password
        ]);

        $mail = config("filament-team-manager.mail.create-user.class");

        Mail::to($user->email)->send(new $mail($user->email, $password));

        return $user;

    }

}
