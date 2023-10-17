@extends('layouts.app')
@section('titulo')
    Registrate en devstagram
@endsection
@section('contenido')
<div class="md:flex ">
    <div class="md:w-6/12 p-5">
        <img class="rounded-lg " src="{{asset('img/registro.jpeg')}}" alt="Imagen de registro">
    </div>
    <div class="md:w-4/12 bg-white rouded-lg p-5 shadow-xl">
        <form action="" method="post">
            @csrf
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppcase text-gray-500 font-bold">Nombre</label>
                <input type="text" name="name" id="" placeholder="Nombre" class="border p-3  w-full rounded-lg">
                @error('name')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="mb-2 block uppcase text-gray-500 font-bold">User Name</label>
                <input type="text" name="username" id="username" placeholder="User Name" class="border p-3  w-full rounded-lg">
                @error('username')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
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
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppcase text-gray-500 font-bold">Repite Pasword</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite Password" class="border p-3  w-full rounded-lg">
                @error('password_confirmation')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
             {{-- boton --}}
           <input type="submit" value="Crear Cuenta" class="bg-sky-500 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white  rounded-lg">
           </form>
          
    </div>
</div>

   
@endsection