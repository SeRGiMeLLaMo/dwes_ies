<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Importar el modelo Book
use App\Http\Requests\BookRequest; // Importar el request BookRequest

    class BookController extends Controller
    {
        //
        public function index()
        {
            //obtenemos todos los libros de la base de datos
            $books = Book::all();
            //retornamos la vista con los libros, la función compact nos permite pasar variables a la vista en un array asociativo  
            return view('book.index', compact('books'));
        }


        //crea create, donde se pasa una vista para que cree un libro
        public function create()
        {
            return view('book.create');
        }

        //crea store, donde se guarda el libro en la base de datos
        public function store(BookRequest $request)
        {
            Book::create($request->all());
            return redirect()->route('book.index')->with('success', 'Libro creado correctamente');   
        }

        //muestra el formulario para editar un libro
        public function edit(Book $book)
        {
            //$book = Book::find($id);  NO NECESARIO. Lo hace de forma implícita
            return view('book.edit', compact('book'));
        }

        //actualiza un libro
        public function update(BookRequest $request, Book $book)
        {
            $book->update($request->all());
            return redirect()->route('book.index')->with('success', 'Libro actualizado correctamente');
        }

        //muestra un libro en específico
        public function show(Book $book)
        {
            return view('book.show', compact('book'));
        }

        //eliminar un libro
        public function destroy(Book $book)
        {
            $book->delete();  
            return redirect()->route('book.index')->with('danger', 'Libro eliminado correctamente');
        }
    
  
}

