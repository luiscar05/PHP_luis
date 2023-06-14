<?php
$listado = readline("ingrese La cantidad De numeros de La lista");
for ($a=1; $a <= $listado; $a++) { 
    $lista[$a]=floatval(readline(prompt:"Ingrese el numero $a \n"));
}


// Elemento a buscar
$element = readline("Que deseas buscar?");

// Buscar el elemento en la lista
$posicion = -1;

foreach ($lista as $indice => $valor) {
    if ($valor == $element) {
        $posicion = $indice;
        break;
    }
}

// Mostrar el resultado
if ($posicion != -1) {
    echo "El elemento $element se encuentra en la posición $posicion de la lista.";
} else {
    echo "El elemento $element no se encuentra en la lista.";
}
?> 