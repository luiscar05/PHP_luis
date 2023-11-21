@extends('layouts.app')
@section('titulo')
    CRUD BASICO
@endsection
@section('contenido')
    <div class="flex  flex-row">
        <p>Regsitra Los Usuarios o preciona el boton de listar usuarios para verlos</p>
        <button class="btn bg-slate-500 p-5 rounded-xl"><a href="/listar-Users">Listar Usuarios</a></button>
    </div>
@endsection