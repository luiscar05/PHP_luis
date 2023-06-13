<?php

function fibonacci($numero) {
    $secuencia = [];

    // Los primeros dos números de Fibonacci
    $secuencia[0] = 0;
    $secuencia[1] = 1;

    // Generar los siguientes números de Fibonacci
    for ($i = 2; $i < $numero; $i++) {
        $secuencia[$i] = $secuencia[$i - 1] + $secuencia[$i - 2];
    }

    return $secuencia;
}

$limite = readline("Ingrese el número límite: ");

$secuenciaFibonacci = fibonacci($limite);

echo "La secuencia de Fibonacci hasta el número $limite es:\n";
foreach ($secuenciaFibonacci as $numero) {
    echo $numero . " ";
}
