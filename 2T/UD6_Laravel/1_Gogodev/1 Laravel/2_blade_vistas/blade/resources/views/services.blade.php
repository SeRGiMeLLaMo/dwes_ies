@extends('layouts.landing')

@section('title', 'Services')

<h1>Services</h1>

@section('body')
    <h1>Services</h1>
    <div>
        <h3>Service 1</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
    <div>
        <h3>Service 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
    <div>
        <h3>Service 3</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
    <div>
        <h3>Service 4</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
    <div>
        <h3>Service 5</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
    <div>
        <h3>Service 6</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing </p>
    </div>
@endsection



@component('_components.card')
        @slot('title', 'Service 1')
        <img src="{{ asset('assets/img/image.png') }}" alt="mi foto" width="80 px">
        @slot('content', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod')
@endcomponent