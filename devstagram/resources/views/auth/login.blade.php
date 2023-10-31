@extends('layouts.app')
@section('titulo')
    Inicia Sesion en devstagram
@endsection
@section('contenido')
<div class="md:flex ">
    <div class="md:w-6/12 p-5">
        <img class="rounded-lg " src="{{asset('img/registro.jpeg')}}" alt="Imagen de registro">
    </div>
    <div class="md:w-4/12 bg-white rouded-lg p-5 shadow-xl">
        <form method="post"  action= "{{route ('login')}}" novalidate>
            @csrf
            @if(session('message'))
                 <p class="bg-red-500 text-white rounded-lg my-2 text-2xl text-center">{{ session('message') }}</p>
            @endif

            <div class="mb-5">
                <label for="email" class="mb-2 block uppcase text-gray-500 font-bold">E-mail</label>
                <input type="email" name="email" id="" placeholder="E-mail" class="border p-3  w-full rounded-lg">
                @error('email')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppcase text-gray-500 font-bold">Password</label>
                <input type="password" name="password" id="password" placeholder="Pasword" class="border p-3  w-full rounded-lg">
                @error('password')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div class="mb-5">
                <input type="checkbox" name="remember"><label for="" class="mb-2 block uppcase text-gray-500 font-bold">Mantener mi sesion abierta</label>
            <div>

            </div>
           <input type="submit" value="Iniciar Sesion" class="bg-sky-500 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white  rounded-lg">
           </form>
          
    </div>
</div>

   
@endsection