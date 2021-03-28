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
    public function create(Course $Course,Assignment $assignment)
    {

    	$assignment->create($this->validateAssignments());
    	return back();
    }
    public function show(Course $course,Assignment $assignment)
    {

            $assignments =  $assignment;



   



      
    


        return view('Insideassignment.Insideassignment', compact('assignments'));
    }

      protected function validateAssignments()
    {
        return request()->validate([
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'video_url' => 'required',
            
        ]);
    }
}
