@extends('../layouts.app')
@section('titulo')
    Registrate en devstagram
@endsection
@section('contenido')
<div class="md:flex ">
    <div class="md:w-4/12 bg-white rouded-lg p-5 shadow-xl">
        <form action="" method="post">
            @csrf
            <div class="mb-5">
                <label for="cedula" class="mb-2 block uppcase text-gray-500 font-bold">Cedula</label>
                <input type="number" name="cedula" id="cedula" placeholder="Cedula" class="border p-3  w-full rounded-lg">
                @error('cedula')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppcase text-gray-500 font-bold">Nombre</label>
                <input type="text" name="name" id="" placeholder="Nombre" class="border p-3  w-full rounded-lg">
                @error('name')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="direccion" class="mb-2 block uppcase text-gray-500 font-bold">Direccion</label>
                <input type="text" name="direccion" id="direccion" placeholder="direccion" class="border p-3  w-full rounded-lg">
                @error('direccion')
                    <p class="bg-red-500 text-white rounded-lg my-2 text5m text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="telefono" class="mb-2 block uppcase text-gray-500 font-bold">Telefono</label>
                <input type="number" name="telefono" id="telefono" placeholder="telefono" class="border p-3  w-full rounded-lg">
                @error('telefono')
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
            
            
             {{-- boton --}}
           <input type="submit" value="Crear Cuenta" class="bg-sky-500 hover:bg-sky-700 transition-color cursor-pointer uppercase font-bold w-full p-3  text-white  rounded-lg">
           </form>
          
    </div>
</div>

   
@endsection