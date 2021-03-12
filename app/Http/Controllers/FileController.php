<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;


class FileController extends Controller
{
    public function store(Request $request)
    {
        File::create($this->validateFile());
        
        
        return redirect();
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
            'name' => 'required',
            'file' => ['file'],
            'user_id' => 'required',
        ]);
        
        if (request('file')) {
            $attributes['file'] = request('file')->storeAs('files', request('file')->getClientOriginalName());
        }

        return $attributes;
    }
}
