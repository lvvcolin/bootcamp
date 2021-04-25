<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FileController extends Controller
{


    public function index(Course $course,Assignment $assignment)
    {
        
        $user = Auth::user();
        return view('file',compact('user','assignment','course'));
    }
    public function store(Request $request)
    {
        File::create($this->validateFile());
        
        
        return back();
    }

    public function show()
    {
        
    }

    public function update(File $File)
    {
        $File->update($this->validateFile());

        return back();
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        $file->delete();

        return back();
    }

    protected function validateFile()
    {
        $attributes = request()->validate([
            'file' => 'required',
            'file' => ['file'],
            'user_id' => 'required',
        ]);
        
        if (request('file')) {
            $attributes['file'] = request('file')->storeAs('files', request('file')->getClientOriginalName());
        }

        return $attributes;
    }
}
