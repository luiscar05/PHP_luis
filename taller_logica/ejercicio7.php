<?php

$listado=readline(prompt:"ingrese la cantidad de numeros de la lista");

for ($a=1; $a <= $listado; $a++) { 
    $lista[$a]=floatval(readline(prompt:"Ingrese el numero $a \n"));
}


// Elemento a buscar
$element = readline(prompt:"ingrese el dato que va a buscar "); 

// Función para buscar el elemento y obtener su posición
function buscarElemento($lista, $element) {
    foreach ($lista as $indice => $valor) {
        if ($valor == $element) {
            return $indice-1;
        }
    }
    return -1; // Si no se encuentra el elemento, retorna -1
} 

// Buscar el elemento en la lista
$posicion = buscarElemento($lista, $element);

// Mostrar el resultado
 if ($posicion != -1) {
    echo "El elemento $element se encuentra en la posición $posicion de la lista.";
} else {
    echo "El elemento $element no se encuentra en la lista.";
}

?> 