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
        <header class="p-5 border-b shadow bg-white">
            <h1 class="text-start  font-black">Devstagram</h1>
            
            <nav class="flex gap-2 text-center">
                <a href="">Login</a>
                <a href="/Register">Crear cuenta</a>
            </nav>
        </header>
        <main class="container mt-10 mx-auto">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        <footer>
            <h3 class="text-center font-black p-5 text-gray-500 font-bold uppercase">
                Todos los derechos- reservados  {{date("Y")}}

            </h3>
        </footer>
    </body>
</html>
