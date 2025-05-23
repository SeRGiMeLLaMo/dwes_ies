@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">&larr; Atrás</a>

    <div class="card mt-4">
        <h1>Editar Libro</h1>

        <form action="{{ route('book.update', $book->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}">
            @error('title')
                <small>{{ $message }}</small>
            @enderror

            <label for="author">Autor</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}">
            @error('author')
                <small>{{ $message }}</small>
            @enderror

            <label for="genre">Género</label>
            <input type="text" name="genre" id="genre" value="{{ $book->genre }}">
            @error('genre')
                <small>{{ $message }}</small>
            @enderror

            <label for="pages">Páginas</label>
            <input type="number" name="pages" id="pages" value="{{ $book->pages }}">
            @error('pages')
                <small>{{ $message }}</small>
            @enderror

            <input type="submit" value="Actualizar">
        </form>
    </div>
</div>
@endsection
