<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    
    public function index():JsonResponse
    {
        return response()->json(Note::all(), 200);

    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        //
        Note::create($request->all()); 
        return response()->json([
            'success' => true  
        ],201); // El estado 201 corresponde a la creación correcta de u nuevo elemento
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Busca un elemento con su ID y lo devuelve
        $note= Note::find($id);
        return response()->json($note, 200);
    }

    public function update(NoteRequest $request, string $id)
    {
        $note= Note::find($id);
        //podemos usar el Note::update
        //O para ver la opción directa, lo hacemos:
        $note->title= $request->title;
        $note->content= $request->content;
        $note->save(); // Si lo hacemos así, necesitamos guardar
        return response()->json([
            'success' => true  
        ],204); // El estado 204 corresponde a la creación correcta de u nuevo elemento
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Buscamos el elemento a borrar
        $note= Note::find($id);
        return response()->json([
            'success' => true  
        ],200); // El estado 204 corresponde a la creación correcta de u nuevo elemento
    }
}
