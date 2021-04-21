<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AssignmentController extends Controller
{
    public function index(Course $course)
    {
        
        $assignments = $course->assingments;
       

       return view('course.assignments',compact('course','assignments'));
    }
    public function create(Course $Course)
    {

    $assignment = Assignment::Create($this->validateAssignments());



    return back();
    }
    public function show(Course $course,Assignment $assignment)
    {

    $reactions = $assignment->reactions;
    $user = User::find(Auth::user());

    $assignments =  $assignment;
    return view('Insideassignment.Insideassignment', compact('assignments','course','user','reactions'));
    }

      protected function validateAssignments()
    {
       $attributes =  request()->validate([
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'youtube_link' => 'required',
            'avatar' => ['file','required'],
        ]);
            
     
         $attributes['avatar'] = request('avatar')->storeAs('AvatarImages', request('avatar')->getClientOriginalName());


         
         return $attributes;
        

          

    }
}
