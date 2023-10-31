@extends('layouts.app')
@section('titulo')
    hola desde dashboard
@endsection
@section('contenido')
<div class="md:flex  ">
    <div class="md:w-1/2 p-5 rounded-full">
        <div class="bg-gradient-instagram border-4 border-transparent bg-clip-border rounded-full">
            <img class="rounded-lg" src="{{ asset('img/usuario.svg') }}" alt="Imagen de registro" style="width: 60%;">
        </div>
    </div>

    <div class="md:w-1/2 bg-white rouded-lg p-5 shadow-xl">
    @if(auth()->check() && auth()->user()->name)
    <h2 class="text-center text-red-500 font-extralight ">{{ auth()->user()->name }}</h2>
    @else
        Usuario no tiene un nombre definido.
    @endif

    </div>
</div>
@endsection