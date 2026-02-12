<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'dni',
        'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function carpetas(): HasMany
    {
        return $this->hasMany(Carpeta::class);
    }
    public function isRole(){
        return $this->rol;
    }

    public function carpetasc(){
        return $this->hasMany(Carpeta::class,'admin_id','id' );
    }

    public function momorandos(){
        return $this->hasMany(Memorandom::class);
    }
    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = collect($words)->map(function ($word) {
            return Str::upper(Str::substr($word, 0, 1));
        })->take(2)->join('');
        return $initials;
    }

    public function notifications()
    {
        return $this->hasMany(Notificacion::class);
    }
}
