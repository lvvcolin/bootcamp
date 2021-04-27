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
        'username',
        'avatar',
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
        return $this->belongsToMany(Assignment::class)->withPivot('assignment_id','completed_at','submitted_at');
    }

    public function CompletedAssignments($course)
    {
        return $this->belongsToMany(Assignment::class)->where('course_id', $course->id)->wherePivot('completed_at', '!=', null)->get();
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

    public function getRouteKeyName()

    {

        return "username";
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ?: 'https://www.gravatar.com/avatar/');
       
    }
}
