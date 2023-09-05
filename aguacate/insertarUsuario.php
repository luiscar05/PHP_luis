
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insertarUser.css">
    <title>Document</title>

</head>
<body>
    <style>
        h1{
            display: flex;
        justify-content: center;
        align-items: center;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 3em;
        font-weight: 400;
        background: -webkit-linear-gradient(rgb(135, 181, 28), hwb(113 3% 65%));
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent; 
        color: greenyellow; 
        }
        form{
        text-align: center;
        border: 1px solid silver;
        display: grid;
        grid-template-columns: repeat(2,1fr);
        margin: 20px;
       }
       
    h2{
    font-size: 1em;
    color: black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    select{
    padding: 5px;
    width: 300px;
    border-radius: 7px;
    border:1px solid black;
}

    input{
    width: 300px;
    padding: 7px;
    outline: none;
    cursor: pointer;
    border-radius: 7px;
    border:1px solid black;
    }
    .guardar{
    width: 300px;
    padding: 7px;
    justify-content: center;
    align-items: center;
    position: relative;
    left: 76%;
    margin-top: 40px;
    background-color:rgb(135, 181, 28);
    color: black;
    font-size: 1.1em;
}
.guardar:hover{
    background-color:hwb(113 3% 65%);
    color: white;
}
.regresar{
    width: 100px;
    background-color:  rgb(162, 51, 51);
    border-radius: 5px;
    padding: 5px;
    broder:none;
}
.regresar:hover{
    background-color: rgb(161, 100, 100);
}

.regresar a{
    color: white;
    font-size: 1.2em;
    list-style: none;
    text-decoration: none;
}
    
    </style>
    <h1>Registra Tu Vehiculo</h1>

    <button class="regresar"><a href="./index.php">Regresar </a></button>

    <form action="" method="POST" name="formulario">
        <div class="one">
            <h2>Seleccione Su tipo de documento</h2>
            <select name="tipo_document" id="">
                <option value="">Seleccione Una</option>
                <option value="Cedula">Cedula</option>
                <option value="Cedula Extranjera">Cedula Extranjera</option>
                <option value="Tarjeta Identidad">Tarjeta Identidad</option>
            </select>
            <h2>Ingrese Su Numero de documento</h2>
            <input type="number" name="identificacion" id=""placeholder="Numero ID" required >

            <h2>Ingrese su Nombre</h2>
            <input type="text" name="nombre" id="" placeholder="Nombre"required>
        </div>
        
        <div class="two">
            <h2>Ingrese su placa </h2>
            <input type="text" name="placa" id=""placeholder="Placa"required>

            <h2>Ingrese su Marca de vehiculo</h2>
            <input type="text" name="marca" id="" placeholder="Marca"required>

            <h2>Ingrese el color de su vehiculo</h2>
            <input type="text" name="color" id=""placeholder="Color"required>
        </div>
        
        <input type="submit" name="btn" value="Guardar.." class="guardar">

    </form>
</body>
</html>

<?php

require_once("data/conexion.php");
require_once("class/claseParqueadero.php");
require_once("class/claseVehiculo.php"); 
require_once("class/claseUsuario.php");


if (isset($_POST['btn'])) { 
   
    if (isset($_POST['tipo_document'])) {
        $ty_document = $_POST['tipo_document'];  
    } 
    $num_identificacion = $_POST['identificacion'];
    $nombre=$_POST['nombre'];
    $placa=strtoupper($_POST['placa']);
    $marca=$_POST['marca'];
    $color=$_POST['color'];
    $nuevoUsuario=new Usuario ($num_identificacion,$ty_document,$nombre,$placa,$marca,$color);
    $nuevoUsuario->setInsertar($base);
    /* $nuevoUsuario->generarLugar($base);
    echo "Lugar asignado: $lugar_asignado"; */
    echo '<div class="main_exito">
            <div class="exito">
            <h3>Tu registro Fue exitoso</h3>
            <button><a href="insertarUsuario.php">Aceptar..</a></button>
            </div>
        </div>';
}

?>


