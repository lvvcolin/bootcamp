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
        if (auth()->user()->student()) {

            if ($course->id == 1 || $course->PrevCourseCompleted(auth()->user())) {
                return view('course.assignments', compact('course'));
            } else {
                echo ('sorry bro?');
            }

        } else {

            return view('course.assignments', compact('course'));
        }
    }

    public function create(Course $Course)
    {
        Assignment::Create($this->validateAssignments());

        return back();
    }
    public function show(Course $course, Assignment $assignment)
    {
        // $assignment->reactions;
        
        return view('Insideassignment.Insideassignment', compact('assignment', 'course'));
    }


    public function startAssignment(Course $course, Assignment $assignment)
    {
        // if pivot user_id is empty
        if ($assignment->users()->where('user_id', Auth::user()->id)->get()->isEmpty() == true) {

            // submit user to assignment
            $assignment->users()->attach(Auth::user(), ['submitted_at' => NOW()]);
            return back();
        } else {

            // already submited             
            return redirect(route('show_file', [$course->id, $assignment->id]));
        }
    }

    protected function validateAssignments()
    {
        $attributes =  request()->validate([
            'course_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'youtube_link' => 'required',
            'avatar' => ['file', 'required'],
        ]);


        $attributes['avatar'] = request('avatar')->storeAs('AvatarImages', request('avatar')->getClientOriginalName());



        return $attributes;
    }
}
