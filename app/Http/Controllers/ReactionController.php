<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Reaction;



class ReactionController extends Controller
{
    public function create(Request $request)
    {
        $reaction = new Reaction;
        $reaction->message = $request->message;
        $reaction->user_id = $request->user_id;
        $reaction->assignment_id = $request->assignment_id;
        $reaction->save();

        // Reaction::create($this->validateReaction());
    }

    public function index(Course $course, Assignment $assignment)
    {

        return $assignment->reactions->load('user');
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
