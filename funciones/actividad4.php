<?php
function sumarDigitos($numero) {
    $suma = 0;

    // Convierte el número en una cadena de caracteres
    $numeroStr = (string) abs($numero);

    // Recorre cada dígito y los suma
    for ($i = 0; $i < strlen($numeroStr); $i++) {
        $suma += (int) $numeroStr[$i];
    }

    return $suma;
}
$a=intval(readline("ingrese un numero "));
echo sumarDigitos($a);
?>