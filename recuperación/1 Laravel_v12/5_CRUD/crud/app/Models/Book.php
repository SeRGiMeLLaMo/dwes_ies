<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Definimos la tabla asociada al modelo
    // En este caso, la tabla se llama 'books'
    protected $table = 'books'; 

    protected $fillable = [
        'title',
        'author',
        'genre',
        //'publication_date',
        'pages',
        //'finished',
        //'rating',
        //'views',
    ];

    protected $casts = [
        //'publication_date' => 'date',
        //'finished' => 'boolean',
        //'rating' => 'decimal:1', // Cambiado a decimal con un máximo de 5.0
        //'views' => 'integer',
    ];


}
