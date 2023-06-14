<?php
$numero = readline("ingrese un numero"); 

if ($numero <= 1) {
    echo "El número $numero no es primo";
} else {
    $esPrimo = true;

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i === 0) {
            $esPrimo = false;
            break;
        }
    }

    if ($esPrimo) {
        echo "El número $numero si es primo";
    } else {
        echo "El número $numero no es primo";
    }
}
?>