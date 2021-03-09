<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User has many files $user->files;
    public function files()
    {
        return $this->hasMany(File::class);
    }

    // This is the pivot table connection with Assignment model
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }

    public function visitors()
    {
        return $this->role == 0;
    }

    public function registered_users()
    {
        return $this->role == 1;
    }
    public function admin()
    {
        return $this->role == 2;
    }
}
