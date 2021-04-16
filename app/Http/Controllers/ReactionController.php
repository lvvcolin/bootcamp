<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reaction;



class ReactionController extends Controller
{
    public function create()
    {
        Reaction::create($this->validateReaction());
        return back();
    }


    protected function validateReaction()
    {
        return request()->validate([
            'reacties' => 'required',
            'assignment_id' => 'required',
            'user_id' => 'required',
        ]);
        
    }
}
