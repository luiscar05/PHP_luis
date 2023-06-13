<?php
$num1 = readline("Ingrese un numero del 1 al 3 : ");
$respuesta = match ($num1) {
    "1" => "Bienvenido usuario número 1",
    "2" => "¡Has vuelto, usuario número 2!",
    "3" => "Es un gusto registrarte, usuario número 3",
    default => "Número no registrado"
};
echo $respuesta;
?>
