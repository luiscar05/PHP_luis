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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>
    <body class="antialiased">
    <header class="flex items-center justify-between p-5 border-b shadow bg-white">
        <button class="btn bg-blue-900 p-4 rounded-2xl hover:bg-slate-700">
            <a href="/registrar-usuario" class="text-white flex px-2">
                Registrar Usuario
                <img class="w-6  text-white" src="{{ asset('img/mapa-marcador-plus.svg') }}" alt="" srcset="">
            </a>
        </button>
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
        @yield('scripts')
    </body>
</html>
