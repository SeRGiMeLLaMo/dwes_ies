@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">&larr; Atrás</a>

    <div class="card mt-4">
        <h1>Crear Libro</h1>

        <form method="POST" action="{{ route('book.store') }}" class="mt-4">
            @csrf

            <label for="title">Título</label>
            <input type="text" name="title" id="title" >
            @error('title')
                <small>{{ $message }}</small>
            @enderror

            <label for="author">Autor</label>
            <input type="text" name="author" id="author">
            @error('author')
                <small>{{ $message }}</small>
            @enderror

            <label for="genre">Género</label>
            <input type="text" name="genre" id="genre">
            @error('genre')
                <small>{{ $message }}</small>
            @enderror

            <label for="pages">Páginas</label>
            <input type="number" name="pages" id="pages">
            @error('pages')
                <small>{{ $message }}</small>
            @enderror

            <input type="submit" value="Crear">
        </form>
    </div>
</div>
@endsection
