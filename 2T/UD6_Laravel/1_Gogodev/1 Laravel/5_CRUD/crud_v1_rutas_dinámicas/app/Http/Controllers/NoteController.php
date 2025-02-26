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

       //retornamos la vista con las notas, la función compact nos permite pasar variables a la vista en un array asociativo  
         return view('note.index', compact('notes'));
    }

    //crea create, donde se pasa una vista para que cree una nota
    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        /*
        1.
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();

        2.
        $note = Note::create(
            [
                'title' => $request->title,
                'description' => $request->description
            ]
        );
        */
        Note::create($request->all());

        return redirect()->route('note.index');
    }

    public function edit(Note $note)
    {
       //$note = Note::find($id);  NO NECESARIO. Lo hace de forma implícita
        return view('note.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return redirect()->route('note.index');
    }

    public function show(Note $note)
    {
        return view('note.show', compact('note'));
    }

    public function destroy(Note $note)
{

      $note->delete();  
    return redirect()->route('note.index');
  }

  
}

