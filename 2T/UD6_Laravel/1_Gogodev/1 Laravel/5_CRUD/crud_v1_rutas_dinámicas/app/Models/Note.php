<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //añade title y description como fillable
    protected $fillable = ['title', 'description'];
}
