<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;


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

            $assignments =  $assignment;



        return view('Insideassignment.Insideassignment', compact('assignments'));
    }

      protected function validateAssignments()
    {
       $attributes =  request()->validate([
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => ['file','required'],
            'avatar' => ['file','required'],
        ]);


         $attributes['image'] = request('image')->storeAs('videosImages', request('image')->getClientOriginalName());
         
         $attributes['avatar'] = request('avatar')->storeAs('AvatarImages', request('avatar')->getClientOriginalName());


         
         return $attributes;
         return $attributes;

          

    }
}
