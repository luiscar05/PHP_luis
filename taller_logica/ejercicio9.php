<?php
$limite = readline("Ingrese el número límite: ");

$secuencia = [0, 1];

// Generar los siguientes números de Fibonacci hasta alcanzar el límite
$i = 2;
while ($secuencia[$i - 1] + $secuencia[$i - 2] <= $limite) {
    $secuencia[$i] = $secuencia[$i - 1] + $secuencia[$i - 2];
    $i++;
}

echo "La secuencia de Fibonacci hasta el número $limite es:\n";
foreach ($secuencia as $numero) {
    echo $numero . " ";
}
