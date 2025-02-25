@extends('layouts.app')

@section('content')

        <h1>Crear Nota</h1>
        <a href="{{ route('note.index') }}">Back</a>
        <form>
                <label for="title">Título</label>
                <input type="text">
            
                <label>Description</label>
                <input type="text">
           
            <input type="submit" value="Create"/>
        </form>
 
@endsection