<?php
$entrada = readline("Ingrese una lista de números separados por espacios: ");
$nums = explode(" ", $entrada);

// Convertir los números de tipo string a tipo int
$nums = array_map('intval', $nums);

// Ordenar la lista utilizando la función sort()
sort($nums);

echo "Lista ordenada de menor a mayor: " . implode(" ", $nums) . "\n";