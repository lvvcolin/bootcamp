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
        'role',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    // User has many files $user->files;
    public function files()
    {
        return $this->hasMany(File::class);
    }

    // This is the pivot table connection with Assignment model
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class,'assignment_user', 'assignment_id','user_id');
    }

    public function student()
    {
        return $this->role == 1;
    }
    public function teacher()
    {
        return $this->role == 2;
    }
    public function moderator()
    {
        return $this->role == 3;
    }
}
