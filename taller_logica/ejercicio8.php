<?php
$rangoInicio = readline("Ingrese el inicio del rango: ");
$rangoFin = readline("Ingrese el fin del rango: ");

$numerosPerfectos = [];

for ($numero = $rangoInicio; $numero <= $rangoFin; $numero++) {
    $sumaDivisores = 0;

    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $sumaDivisores += $i;
        }
    }

    if ($sumaDivisores == $numero) {
        $numerosPerfectos[] = $numero;
    }
}

echo "Los números perfectos en el rango de $rangoInicio a $rangoFin son:\n";
foreach ($numerosPerfectos as $numeroPerfecto) {
    echo $numeroPerfecto . "\n";
}