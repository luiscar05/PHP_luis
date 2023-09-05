<?php
require("data/conexion.php");
if (isset($_GET['upd'])) {
   $id = $_GET['upd'];

   $sql = "SELECT * FROM usuario WHERE identificacion=:id";
   $stmt = $base->prepare($sql);
   $stmt->bindParam(":id", $id);
   $stmt->execute();

   $count = $stmt->rowCount();
   if ($count > 0) {
      $datos = $stmt->fetch();   
   }
   $identifi=$datos[0];
   echo var_dump($identifi);
   $sqlVehiculo = "SELECT fk_vehiculo FROM parqueadero WHERE fk_Usuario=:id";
   $stmtVehiculo = $base->prepare($sqlVehiculo);
   $stmtVehiculo->bindParam(":id", $id);
   $stmtVehiculo->execute();

   $countVehiculo = $stmtVehiculo->rowCount();
   $datosCar = array();
   if ($countVehiculo > 0) {
      $datosCar = $stmtVehiculo->fetch();
   }

   $placa = $datosCar['fk_vehiculo'];

   $sqlAllCar = "SELECT * FROM vehiculo WHERE placa=:plaquita";
   $stmtAllCar = $base->prepare($sqlAllCar);
   $stmtAllCar->bindParam(":plaquita", $placa);
   $stmtAllCar->execute();

   $datosVehiculo = $stmtAllCar->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Actualizar Usuario</title>
</head>
<body>
   <style>
   h2{
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
      font-size: 3.5em;
      font-weight: 400;
      background: -webkit-linear-gradient(rgb(135, 181, 28), hwb(113 3% 65%));
      -webkit-background-clip: text; 
      -webkit-text-fill-color: transparent; 
      color: greenyellow; 
   }
   form{ 
      padding:20px;
     width:300px;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     margin: auto;
   
     border-radius: 7px;
     -webkit-box-shadow: 28px 28px 117px -30px rgba(0,0,0,1);
      -moz-box-shadow: 28px 28px 117px -30px rgba(0,0,0,1);
      box-shadow: 28px 28px 117px -30px rgba(0,0,0,1);
        
   }
   .form-group{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
   }
   .form-group input{
      border: none;
      border-bottom: 1px solid black;
      border-radius: 7px;
      width: 200px;
      outline: none;
      cursor: pointer;
      padding: 5px;
      font-size: 1.2em;
      background-color: rgba(181, 218, 181, 0.42);
   }
   .actualizar{
         width: 300px;
         padding: 7px;
         margin-top: 20px;
         background-color:rgb(135, 181, 28);
         color: black;
         font-size: 1.1em;
         border:none;
         border-radius: 5px;
   }
   .actualizar:hover{
      background-color:hwb(113 3% 65%);
            color: white;
   }
     
   </style>
   <h2>Actualizar Usuario</h2>
   <form action="" method="post">
      <div class="form-group">
         <input type="hidden" name="iden" value='<?php echo $identifi;?>'>
         <input type="text" name="userNameUpd" id="username" class="" placeholder="Nombre" value="<?php echo $datos['nombre']; ?>">
      </div>
      <div class="form-group">
         <input type="hidden" name="placa" value="<?php echo $placa;?>">
         <input type="text" name="marca" id="marca" class="" placeholder="Marca vehiculo" value="<?php echo $datosVehiculo['marca']; ?>">
      </div>
      <div class="form-group">
         <input type="text" name="color" id="color" class="" placeholder="Color vehiculo" value="<?php echo $datosVehiculo['color']; ?>">
      </div> 

      <input type="submit" value="Actualizar..." name="bntUpd" class="actualizar">
   </form>
</body>
</html>

<?php
require("data/conexion.php");

if (isset($_POST['bntUpd'])) {
   if (!empty($_POST['iden']) && !empty($_POST['userNameUpd']) && !empty($_POST['placa']) && !empty($_POST['marca']) && !empty($_POST['color'])) {
      $identificacion = $_POST['iden'];
      $nombreact = $_POST['userNameUpd'];
      $placa = $_POST['placa'];
      $marca = $_POST['marca'];
      $color = $_POST['color'];
      
      // Actualizar nombre de usuario
      $updUser = "UPDATE usuario SET nombre = :nom WHERE identificacion = :identi";
      $preparaUpdUser = $base->prepare($updUser);
      $preparaUpdUser->bindParam(':nom', $nombreact);
      $preparaUpdUser->bindParam(':identi', $identificacion);
      
      // Actualizar marca y color del vehículo
      $updCar = "UPDATE vehiculo SET marca = :marquita, color = :colorcito WHERE placa = :plate";
      $preparaUpdCar = $base->prepare($updCar);
      $preparaUpdCar->bindParam(':marquita', $marca);
      $preparaUpdCar->bindParam(':colorcito', $color);
      $preparaUpdCar->bindParam(":plate", $placa);

      if ($preparaUpdUser->execute() && $preparaUpdCar->execute()) {
         header("location: index.php");
         exit;
      } else {
         echo "Hubo un problema al actualizar.";
      }
   }
}
?>




 