<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }

    public function perkebunan()
    {
        return $this->belongsToMany(Perkebunan::class, 'id_perkebunan');
    }

    public function getRole()
    {
        return $this->role == 2 ? 'Users' : 'User';
    }

    public function getWilayah()
    {
        return $this->wilayah->nama;
    }

    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function isNotAdmin()
    {
        return $this->role != 1;
    }
}
