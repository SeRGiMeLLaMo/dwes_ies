@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">&larr; Atrás</a>
    <h1>Top 3 Libros Mejor Valorados</h1>

    @if($books->isEmpty())
        <p class="text-gray-500">No hay libros disponibles.</p>
    @else
        <ul>
            @foreach($books as $book)
                <li class="card">
                    <h2>{{ $book->title }}</h2>
                    <p>Calificación promedio: {{ $book->rankings_avg_rating }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection