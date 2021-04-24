<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function PrevCourse()
    {
        return Course::find($this->id - 1);
    }

    public function PrevCourseCompleted($user)
    {
        $allAssignmentsPrevCourse = $this->PrevCourse()->assignments;
        $completedAssignmentsByUser = $user->CompletedAssignments($this->PrevCourse());
        
        $diff = $allAssignmentsPrevCourse->diff($completedAssignmentsByUser);
        if(count($diff) > 0){
            return False;
        } else {
            return True;
        }
    }

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
