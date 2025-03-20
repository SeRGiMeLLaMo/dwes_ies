@extends('layouts.landing')

@section('title', 'contacto')

@section('content')
    <h1>Contacto</h1>
        <form>
            <label for="name">Nombre:</label>
            <input type="text" id="name" placeholder="Escribe tu nombre">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" placeholder="Escribe tu correo">

            <label for="message">Mensaje:</label>
            <textarea id="message" rows="4" placeholder="Escribe tu mensaje"></textarea>

            <button type="button">Enviar</button>
        </form>
@endsection