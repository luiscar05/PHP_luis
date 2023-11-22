<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  {{--   <link rel="stylesheet" href="resources/css/pdf.css"> --}}
    <style>
        .Title {
            font-size: 2em;
            text-align: center;
            color: red;
            font-weight: bold;
        }
        .main {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .box-img, .box-info {
            width: 50%;
            display: flex;
            margin: 2px;
        }
    </style>
</head>
<body>
    {{-- <h2>Usuarios {{$usuario->name}} </h2> --}}
    <h2 class="Title">Usuario</h2>
    <div class="main">
        <div class="box-img">
           {{--  <img src="{{ asset('img/usuario.png') }}" alt="" srcset=""> --}}
            <h3> Nombre: {{$usuario->name}}</h3>
        </div>

        <div class="box-info">
            <h3> Documento: {{$usuario->cedula}}</h3>
            <h3> Direccion: {{$usuario->direccion}}</h3>
            <h3> Telefono: {{$usuario->telefono}}</h3>
            <h3> Correo: {{$usuario->correo}}</h3>
        </div>
    </div>
</body>
</html>
