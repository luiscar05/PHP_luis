<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
    <header class="flex items-center justify-between p-5 border-b shadow bg-white">
    <h1 class="text-2xl  font-extrabold">Devstagram</h1>

    {{-- Comprobar si el usuario esta autenticado --}}

    @auth
        <nav class="flex items-center space-x-4"> 
            <a href="#" class="hover:border-b hover:shadow-sm text-gray-600">
                hola <span class="font-bold">{{auth()->user()->username}}</span>
            </a>
            <form action="{{route('logout')}}" method="post">
                @csrf 
                <button type="submit" class="hover:border-b hover:shadow-sm">
                    Cerrar Sesion
                </button>
            </form>
            {{-- <a href="{{ route('logout') }}" class="hover:border-b hover:shadow-sm">Cerrar Sesion</a> --}}
        </nav>   
    @endauth
    @guest
        <nav class="flex items-center space-x-4">
            <a class="hover:border-b hover:shadow-sm" href="{{ route('login') }}">Login</a>
            <a class="hover:border-b hover:shadow-sm" href="{{ route('register') }}">Crear cuenta</a>
        </nav>
    @endguest
    
</header>

        <main class="container mt-10 mx-auto">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        
        <footer>
            <h3 class="text-center  p-5 text-gray-500 font-bold uppercase">
                Todos los derechos- reservados  {{date("Y")}}

            </h3>
        </footer>
    </body>
</html>
