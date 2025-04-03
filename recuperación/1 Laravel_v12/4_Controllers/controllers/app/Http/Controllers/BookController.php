<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Importar el modelo Book
use Illuminate\Support\Facades\DB; // Importar la clase DB para consultas directas a la base de datos


class BookController extends Controller
{
    //
    public function index(){

        //$books = Book::all();
        //$books = Book::where('finished', true) -> 
        //where('rating', '>=', 4.5)->
       // orwhere('pages', '>=', 500)
        //->orderBy('views', 'desc')
        //->limit(2) // Limitar a 2 resultados
        //->get();

        //Se puede hacer de la siguiente manera
        // return view('books.index', ['books' => $books]); // books es la variable y books es el archivo

        $books = DB::select ('select * from books');

        /*pero cuando la clave y el valor son iguales se puede 
        SIMPLIFICAR con compact de la siguiente manera*/
        return view('books.index', compact('books')); //books es la variable y books es el archivo

       // return view ('books.index'); //books es la carpeta y index es el archivo
      }

      public function create(){

        DB::insert(DB::raw('INSERT INTO books VALUE ...'));
      }
/*
        Book::create([
        "title" => "El libro de la selva",
        "author" => "Rudyard Kipling",
        "genre" => "Aventura",
        "publication_date" => "1894-04-01",
        "pages" => 200,
        "finished" => true,
        "rating" => 4.5,
        "views" => 1000
      ]);

      Book::create([
        "title" => "Harry Potter y la piedra filosofal",
        "author" => "J.K. Rowling",
        "genre" => "Fantasía",
        "publication_date" => "1997-06-26",
        "pages" => 223,
        "finished" => true,
        "rating" => 4.8,
        "views" => 5000
      ]);

      Book::create([
        "title" => "El señor de los anillos",
        "author" => "J.R.R. Tolkien",
        "genre" => "Fantasía",
        "publication_date" => "1954-07-29",
        "pages" => 1178,
        "finished" => true,
        "rating" => 5.0,
        "views" => 10000
      ]);

      Book::create([
        "title" => "Frankenstein",
        "author" => "Mary Shelley",
        "genre" => "Ciencia ficción",
        "publication_date" => "1818-01-01",
        "pages" => 280,
        "finished" => true,
        "rating" => 4.2,
        "views" => 2000
      ]);
    
      return redirect() -> route('book.index');
    }*/

}
