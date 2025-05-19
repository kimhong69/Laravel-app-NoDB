<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //Teacher model
    protected $fillable = ['name', 'age', 'subject'];
}
