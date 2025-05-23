<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Author extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
