<?php
echo ("acontinuacion encontraras 5 opciones seleccione que opcion desea.");
$opciones = readline("ingrese un numero del 1 al 5: ");
$numero1 = realine("ingrese un numero");
$num1 = intval($numero1);
$numero2 = readline("ingrese un otro numero");
$num2 = intval($numero2);

$respuesta = match ($opciones) {
    '1' => "La suma de ".$num1." + ".$num2." es ".$total = $num1 + $num2 ,  
    '2' =>"La resta de " . $num1 . " - " . $num2 . " = " .$total = $num1 - $num2 ,
    '3' =>"La multiplicación de " . $num1 . " x " . $num2 . " es " . $total = $num1 * $num2,
    '4' => "La división de " . $num1 . " / " . $num2 . " es " . $total = $num1 / $num2,
    '5' => ($num1 > $num2) ? "El número " . $num1 . " es el mayor" : "El número " . $num2 . " es el mayor",
    default => "Opción inválida",
};

echo $respuesta;
?>