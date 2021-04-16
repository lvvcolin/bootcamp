<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Assignment;


class Reaction extends Model
{
    use HasFactory;

    protected $guarded = [];




    public function assignments()
    {
      return $this->belongsTo(assignments::class);
    }
    
    public function users()
    {
      return $this->belongsTo(User::class);
    }
    public function Getname()
    {
    return User::find($this->user_id)->name;
       
    }
   
}
