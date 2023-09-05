<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Avocato Parquing</title>
</head>
<body>
    <style>
        *{
    margin: 0;
    padding: 0;
}
    .name {
        display: flex;
        justify-content: center;
        align-items: center;
        margin:auto;
        width:90%;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 5em;
        font-weight: 400;
        background: -webkit-linear-gradient(rgb(135, 181, 28), hwb(113 3% 65%));
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent; 
        color: greenyellow; 
        border:none;
    }
.menu{
    background-color: rgb(50, 50, 50);
}
.menu ul{
    list-style: none;
    margin: 0;
    padding: 0;
}
.menu ul li{
    display: inline-block;
}
.menu ul li a{
    color: white;
    display: block;
    padding: 20px 20px;
    text-decoration: none;
    font-size: 1.1em;
}
.menu ul li a:hover{
    background-color: hwb(116 4% 65%);
    
}
.main-container{
    margin: 100px auto;
    width: 600px;
}
h2{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 500;
    font-size: 2em;
    color: gray;
    margin: auto;

}
table{
    background-color: white;
    border-collapse: collapse;
    text-align: center;
   width: 100%
}
th,td{
    border: 1px solid rgb(37, 37, 37);
    padding: 5px;
    padding: 7px;
}
thead{
    background-color: #246335;
    color: white;
    border-bottom: 1px solid rgb(37, 37, 37);
}
tr:nth-child(even){
    background: #f0eeee;
}
tr:hover td{
    background-color: rgb(214, 206, 195);
}
.box_main{
    width: 100%;
    height: 100vh;
    background-color: #246335;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
}
.busquedas{
  border-radius: 7px;
  border: 1.5px solid gray;
}
    </style>
        <div class="menu">
            <ul>
                <li><a href="insertarUsuario.php">Registro Usuario</a></li>
                <li><a href="buscar.php">Buscar Usuario</a></li>
                <li><a href="eliminarUsuario.php">Eliminar Usuario</a></li>
            </ul>
        </div>
        <h1 class="name"> Avocado Parking </h1>
<div class="main-container">
<?php

require("data/conexion.php");
require_once("class/claseParqueadero.php");
require_once("class/claseVehiculo.php"); 
require_once("class/claseUsuario.php");

$parqueadero = new Usuario(1083869916,"cedula","Luis Carlos Peña ","FWT72A","Chevrolet","negro");
$parqueadero->getUsuarios($base);  



?>

</div>
       
</body>
</html>



