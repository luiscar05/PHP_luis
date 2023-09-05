<?php
require("data/conexion.php");
require_once("class/claseParqueadero.php");
require_once("class/claseVehiculo.php"); 
require_once("class/claseUsuario.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<style>
    *{
        margin: 0;
        padding:0;
    }
    h2 {
        display: flex;
        justify-content: center;
       /*  align-items: center; */
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        font-size: 5em;
        font-weight: 400;
        background: -webkit-linear-gradient(rgb(135, 181, 28), hwb(113 3% 65%));
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent; 
        color: greenyellow; 
    }
    table{
        margin: 40px auto ; 
        background-color: white;
        border-collapse: collapse;
        text-align: center;
        width: 80%
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
    .regresar{
        margin: 0  15px;
        width: 100px;
        background-color:  rgb(162, 51, 51);
        border-radius: 5px;
        padding: 5px;
        border:none;
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

    form{
        width:500px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: auto;
        border: 1px solid silver;    
    }
    
       
    h3{
        font-size: 1.5em;
        color: #1b0404;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin: 10px;
    }
    input{
        width: 250px;
        font-size: 1em;
        padding: 5px;
        margin: 10px;
        outline: none;
        cursor: pointer;
        border-radius: 5px;
        border:1px solid black;
    }
    .buscar{
        width: 300px;
        padding: 7px;
        margin-top: 40px;
        background-color:rgb(135, 181, 28);
        color: black;
        font-size: 1.1em;
}
    .buscar:hover{
        background-color:hwb(113 3% 65%);
        color: white;
    }
    .actualizar{
        display:flex;
        justify-content: center;
        align-items: center;
        margin:auto;
        width: 300px;
        padding: 7px;

        background-color:rgb(135, 181, 28);
        border:none;
        border-radius: 10px 10px 50% 50% / 10px 10px 90px 90px;
    }
    .actualizar a{
        color: white;
        font-size: 1.2em;
        list-style: none;
        text-decoration: none;
        padding: 7px;
        
    }
    .actualizar:hover {
        background-color:hwb(113 3% 65%);
        color: black;
    }
    </style>
    <h2 >Avocato Parquing</h2>
    <button class="regresar"><a href="./index.php">Regresar </a></button>
   
        <form action="" method="post" class="busquedas">
            <h3>Ingrese la placa de su vehiculo</h3>
            <input type="text" name="busqueda" id="" placeholder="Placa"  autofocus>
            <input type="submit" value=" Buscar..." name="btnbus" class="buscar">
           
        </form>
  
    
        
    <br>
    <br>

</body>
</html>
<?php
if (isset($_POST['btnbus'])) {
    $busquedaVehiculo= strtoupper($_POST['busqueda']);
    $ususarioBsuqueda= new Usuario(1083869916,"cedula","Luis Carlos Peña ","FWT72A","Chevrolet","negro");
    $ususarioBsuqueda->BuscarUsuario($busquedaVehiculo,$base);
   
}
    
?>
