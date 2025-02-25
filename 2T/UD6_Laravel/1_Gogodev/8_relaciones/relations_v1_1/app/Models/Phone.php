<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    //protected $fillable = ['prefix', 'phone_number', '', '']
    protected $guarded = [];//para que no se proteja ningun campo



    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
