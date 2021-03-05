<?php

namespace App\Http\Controllers;

use App\Models\Fileupload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileuploadController extends Controller
{
    public function store(Request $request)
    {
        Fileupload::create($this->validateFileupload());
        
        // return back();
        return redirect();
    }

    // public function show(Fileupload $Fileupload)
    // {
    //     $competitions = $Fileupload->competitions->sortBy('name');
    //     $student_files = auth()->user()->student_files();

    //     return view('Fileupload.show', compact('Fileupload', 'competitions', 'student_files')); 
    // }

    public function update(Fileupload $Fileupload)
    {
        $Fileupload->update($this->validateFileupload());

        return back();
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM fileuploads WHERE id=$id";

        DB::update($sql);

        return back();
    }

    protected function validateFileupload()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'file' => ['file'],
            'user_id' => 'required',
        ]);
        
        if (request('file')) {
            $attributes['file'] = request('file')->storeAs('fileuploads', request('file')->getClientOriginalName());
        }

        return $attributes;
    }
}
