@extends('layouts.app')

@section('content')
    <h1>Notes</h1>
    <a href="{{ route('note.create') }}">Create note</a>
    <ul>
        @forelse ($notes as $note)
            <li>
                <a href="#">{{ $note->title }}</a>
            </li>
        @empty
            <li>No data</li>
            
    
        @endforelse
    </ul>
@endsection