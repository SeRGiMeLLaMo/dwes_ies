@extends('layouts.landing')

@section('title', 'Proyectos')

@section('content')
    <h1>Proyectos de Sergio Cubero</h1>
    @component('_components.card')
        @slot('title', 'Proyecto 1')
        @slot('content', 'T-Movil')
    @endcomponent
   
@endsection