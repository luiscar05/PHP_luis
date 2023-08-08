<?php
require_once("claseParqueadero.php");
require_once("claseVehiculo.php"); 
require_once("claseUsuario.php");

$chevrolet = new Usuario(1083869916,"Luis Carlos Peña ","FWT72A","Chevrolet","negro");
$chevrolet->setIngreso(2.00);
$chevrolet->setSalida(4.00);


$NewUser=new Usuario(1144630003,"Mauricio Peña Abella","ZHR45A","Bugatti","Negro");
$NewUser->setIngreso(3.45);
$NewUser->setSalida(5.30);

$NewUser2=new Usuario(83028739,"Carlos Peña","XTZ60B","Bugatti","Rojo");
$NewUser2->setIngreso(3.30);
$NewUser2->setSalida(5.00);

function MostrarInfo($Objeto){
    echo "</br>";
    echo "El vehiculo es de placa  ". $Objeto-> getCarPlaca() ." de color ". $Objeto->getColor();
    echo "</br>";
    echo "Ingreso a las ".$Objeto->getIngreso();
    echo "</br>";
    echo "Valor a pagar: ".$Objeto->getPrecioPago() . "USD";
    echo "</br>";
    echo "El dueño es: ". $Objeto->getInfoUsuario();
    echo "</br>";
    echo "El veiculo esta ubicado en ".$Objeto->getCitio();
    echo "</br>";
}

MostrarInfo($chevrolet);
MostrarInfo($NewUser);
MostrarInfo($NewUser2);
?>