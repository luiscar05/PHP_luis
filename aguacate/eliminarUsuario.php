<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width:500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            border: 1px solid silver;
        }
        h3{
            font-size: 1.2em;
            color: black;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 10px;
        }
        input{
            width: 250px;
            padding: 5px;
            margin: 10px;
            outline: none;
            cursor: pointer;
            border-radius: 5px;
            border:1px solid black;
            font-size: 1em;
        }
        .salida,.eliminar{
            width: 300px;
            padding: 7px;
            margin-top: 20px;
            background-color:rgb(135, 181, 28);
            color: black;
            font-size: 1.1em;
        }
        .salida:hover,.eliminar:hover{
            background-color:hwb(113 3% 65%);
            color: white;
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
.regresar{
    width: 100px;
    margin-left:10px;
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
    </style>
    <h1>Eliminar Usuario</h1>
    <button class="regresar"><a href="./index.php">Regresar </a></button>
    <form action="" method="post">
        <h3>Ingrese la placa de su vehiculo</h3>
        <input type="text" name="placa" id="" autofocus placeholder="Placa">
        <input type="submit" value="Dar Salida..." name="salida" class="salida">
       
    </form>
    <?php
    require_once("data/conexion.php");
    require_once("class/claseParqueadero.php");
    require_once("class/claseVehiculo.php"); 
    require_once("class/claseUsuario.php");
    
        if (isset ($_POST['salida'])) {
            $user= new Usuario(1083869916,"cedula","Luis Carlos Peña ","FWT72A","Chevrolet","negro");
            $placa=strtoupper($_POST['placa']);
            $user->retirarUsuario($placa,$base);
            echo "";
            $user->VerEliminado($placa,$base);
            sleep(4);
            $user->deleteUser($placa,$base);
        }
    ?>

</body>
</html>