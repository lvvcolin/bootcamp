<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];

    // a file belongs to an user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // a file belongs to an assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

}
