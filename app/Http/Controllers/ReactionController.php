<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Reaction;



class ReactionController extends Controller
{
    public function create()
    {
        Reaction::create($this->validateReaction());
        // return back();
    }

    public function index(Course $course, Assignment $assignment)
    {
        return $assignment->reactions;
    }


    protected function validateReaction()
    {
        return request()->validate([
            'message' => 'required',
            'assignment_id' => 'required',
            'user_id' => 'required',
        ]);
        
    }
}
