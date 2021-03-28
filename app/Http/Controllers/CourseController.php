<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;


class CourseController extends Controller
{
    public function index()
    {

    $courses = Course::all();
    return view('Course',compact('courses'));
    }

    public function create()
    {
       
    	$course = Course::create($this->validateProject());
    	return back();
    }	


    protected function validateProject()
    {
        $attributes = request()->validate([
            'name' =>'required',
            'description' => 'required',
            'image' => ['required','file'],
            
        ]);

       

        $attributes['image'] = request('image')->storeAs('images', request('image')->getClientOriginalName());
         
         return $attributes;
    }
}

