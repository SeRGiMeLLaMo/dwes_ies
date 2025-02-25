<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //crea index, donde se muestran todas las notas
    public function index()
    {
        //obtenemos todas las notas
       $notes = Note::all();

       //print_r($notes);
       //retornamos la vista con las notas, la función compact nos permite pasar variables a la vista en un array asociativo    
         return view('note.index', compact('notes'));
    }

    //crea create, donde se pasa una vista para que cree una nota
    public function create()
    {
        return view('note.create');
    }

    //crea store, donde se almacena la nota creada
    public function store(Request $request)
    {
        //validamos los datos
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        //creamos la nota
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        //redirigimos a la vista de todas las notas
        return redirect()->route('note.index');
    }


}

