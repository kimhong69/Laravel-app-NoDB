<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //Students Model
    protected $fillable = ['name', 'age', 'grade'];
}
