@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-space-between mb-4">
        <h1>Libros</h1>
        <a href="{{ route('book.create') }}" class="button">Crear libro</a>
        <a href="{{ route('book.ranking') }}" class="button">Mejor Valorados</a>
    </div>

    @if($books->isEmpty())
        <p class="text-gray-500">No hay libros disponibles.</p>
    @else
        <ul>
            @foreach($books as $book) 
                <li class="card">
                    <h2>{{ $book->title }}</h2>
                    <p>Autores:
                        @foreach($book->authors as $author) <!--Accede a los autores relacionados con el libro.-->
                            {{ $author->username }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </p>
                    <div class="flex mt-4">
                        <a href="{{ route('book.show', $book->id) }}">Ver</a>
                        <a href="{{ route('book.edit', $book->id) }}">Editar</a>
                        <form class="inline-form" action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este libro?');">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
