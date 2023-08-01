<?php
require("clases.php");
require("claseEmpleado.php");
require("claseCliente.php");

$objEmpleado = new Empleados(1083869916, "Luis Carlos", 18);
$objEmpleado->setAsignarPuesto("Administrador"); 
echo $objEmpleado->getDatosPersonales();
echo "Cargo: " . $objEmpleado->getPuesto();

$ObjCliente = new Cliente(1083869917, "Mauricio Peña", 18);
$ObjCliente->setCreditos(1000000); // Créditos almacenados como número entero
echo $ObjCliente->getDatosPersonales();
echo "Crédito: " . $ObjCliente->getCredito();
?>

