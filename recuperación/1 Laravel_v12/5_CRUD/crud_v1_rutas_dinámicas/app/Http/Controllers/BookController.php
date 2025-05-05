<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Importar el modelo Book
use Illuminate\Support\Facades\DB; // Importar la clase DB para consultas directas a la base de datos

class BookController extends Controller
{
    //
    public function index($id = 'UNICOS')
    {
       // $books = Book::all();
        return view('books.index', compact('id'));
    }
}
