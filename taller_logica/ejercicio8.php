<?php

function esNumeroPerfecto($numero) {
    $sumaDivisores = 0;
    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $sumaDivisores += $i;
        }
    }
    return $sumaDivisores == $numero;
}

function encontrarNumerosPerfectos($inicio, $fin) {
    $numerosPerfectos = [];
    for ($numero = $inicio; $numero <= $fin; $numero++) {
        if (esNumeroPerfecto($numero)) {
            $numerosPerfectos[] = $numero;
        }
    }
    return $numerosPerfectos;
}

$rangoInicio = readline("Ingrese el inicio del rango: ");
$rangoFin = readline("Ingrese el fin del rango: ");

$numerosPerfectos = encontrarNumerosPerfectos($rangoInicio, $rangoFin);

echo "Los números perfectos en el rango de $rangoInicio a $rangoFin son:\n";
foreach ($numerosPerfectos as $numeroPerfecto) {
    echo $numeroPerfecto . "\n";
}
