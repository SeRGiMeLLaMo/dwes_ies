@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">&larr; Volver</a>

    <div class="card mt-4">
        <h1>{{ $book->title }}</h1>
        <h2 class="mt-4">Autor: {{ $book->author }}</h2>
        <p class="mt-4">Género: {{ $book->genre }}</p>
        <p>Páginas: {{ $book->pages }}</p>
    </div>
</div>
@endsection
