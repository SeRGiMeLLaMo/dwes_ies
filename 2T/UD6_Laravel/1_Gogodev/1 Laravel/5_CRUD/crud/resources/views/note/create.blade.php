@extends('layouts.app')

@section('content')

        <h1>Crear Nota</h1>
        <a href="{{ route('note.index') }}">Pá trá</a>
        <form method="POST" action="{{ route('note.store') }}">
            @csrf
            <label for="">Title</label>
            <input type="text" name="title"/>

            <br/>

            <label for="">Description</label>
            <input type="text" name="description"/>

            <br/>

            <input type="submit" value="Create"/>
        </form>

@endsection