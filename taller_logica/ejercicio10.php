<?php
function ordenamientoBurbuja($lista) {
    $n = count($lista);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($lista[$j] > $lista[$j + 1]) {
                // Intercambiar los elementos
                $temp = $lista[$j];
                $lista[$j] = $lista[$j + 1];
                $lista[$j + 1] = $temp;
            }
        }
    }
    return $lista;
}

// Obtener la lista de números del usuario
$entrada = readline("Ingrese una lista de números separados por espacios: ");
$nums = explode(" ", $entrada);

// Convertir los números de tipo string a tipo int
$nums = array_map('intval', $nums);

// Ordenar la lista utilizando el algoritmo de ordenamiento en burbuja
$numsOrdenados = ordenamientoBurbuja($nums);

echo "Lista ordenada de menor a mayor: " . implode(" ", $numsOrdenados) . "\n";
