<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kredit;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function kredit()
    {
        return $this->hasOne(Kredit::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('img/default-avatar.png');
    }   
   
public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}
}
