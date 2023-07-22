<?php

// Definimos un arreglo asociativo con los valores y los palos de las cartas
$mazo = array(
    "A" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "K" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "Q" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "J" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "10" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "9" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "8" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "7" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "6" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "5" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "4" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "3" => array("Corazones", "Picas", "Tréboles", "Diamantes"),
    "2" => array("Corazones", "Picas", "Tréboles", "Diamantes")
);

// Definimos una función que genere y devuelva un arreglo con 5 cartas aleatorias del mazo
function repartirCartas($mazo) {
    // Creamos un arreglo vacío para almacenar las cartas
    $cartas = array();
    // Repetimos el proceso 5 veces
    for ($i = 0; $i < 5; $i++) {
        // Elegimos un valor al azar del mazo
        $valor = array_rand($mazo);
        // Elegimos un palo al azar del valor elegido
        $palo = $mazo[$valor][array_rand($mazo[$valor])];
        // Formamos la carta como una cadena de texto
        $carta = $valor . " de " . $palo;
        // Añadimos la carta al arreglo de cartas
        $cartas[] = $carta;
        // Eliminamos la carta del mazo para evitar repeticiones
        unset($mazo[$valor][array_search($palo, $mazo[$valor])]);
        // Si el valor se queda sin palos, lo eliminamos del mazo también
        if (count($mazo[$valor]) == 0) {
            unset($mazo[$valor]);
        }
    }
    // Devolvemos el arreglo de cartas
    return $cartas;
}

// Definimos una función que muestre por pantalla las cartas que se le pasen como argumento, una por línea
function mostrarCartas($cartas) {
    // Recorremos el arreglo de cartas
    foreach ($cartas as $carta) {
        // Mostramos la carta por pantalla
        echo $carta . "\n";
    }
}

// Definimos una función que evalúe la mejor combinación posible de cartas según las reglas del Poker y muestre por pantalla el resultado obtenido
function evaluarMano($cartas) {
    // Creamos un arreglo para almacenar los valores y las frecuencias de las cartas
    $valores = array();
    // Creamos un conjunto para almacenar los palos de las cartas
    $palos = array();
    // Recorremos el arreglo de cartas
    foreach ($cartas as $carta) {
        // Separamos el valor y el palo de la carta
        list($valor, $palo) = explode(" de ", $carta);
        // Añadimos el palo al conjunto de palos
        $palos[] = $palo;
        // Si el valor ya está en el arreglo, incrementamos su frecuencia en uno
        if (array_key_exists($valor, $valores)) {
            $valores[$valor]++;
        // Si no, lo añadimos al arreglo con frecuencia uno
        } else {
            $valores[$valor] = 1;
        }
    }
    // Ordenamos los valores de las cartas de mayor a menor
    $orden = array("A", "K", "Q", "J", "10", "9", "8", "7", "6", "5", "4", "3", "2");
    uksort($valores, function($a, $b) use ($orden) {
        if (array_search($a, $orden) < array_search($b, $orden)) {
            return -1;
        } elseif (array_search($a, $orden) > array_search($b, $orden)) {
            return 1;
        } else {
            return 0;
        }
    });
    // Creamos una variable para almacenar el resultado de la evaluación
    $resultado = "";
    // Evaluamos las posibles combinaciones de cartas según las reglas del Poker
    // Escalera real: A, K, Q, J, 10 del mismo palo
    if (array_keys($valores) == array("A", "K", "Q", "J", "10") && count(array_unique($palos)) == 1) {
        $resultado = "Escalera real";
    // Escalera de color: 5 cartas consecutivas del mismo palo
    } elseif (count(array_unique($palos)) == 1 && array_search(array_keys($valores)[0], $orden) - array_search(array_keys($valores)[4], $orden) == 4) {
        $resultado = "Escalera de color";
    // Póker: 4 cartas del mismo valor
    } elseif (in_array(4, $valores)) {
        $resultado = "Póker";
    // Full house: 3 cartas del mismo valor y 2 cartas del mismo valor
    } elseif (in_array(3, $valores) && in_array(2, $valores)) {
        $resultado = "Full house";
    // Color: 5 cartas del mismo palo
    } elseif (count(array_unique($palos)) == 1) {
        $resultado = "Color";
    // Escalera: 5 cartas consecutivas de diferentes palos
} elseif (isset(array_keys($valores)[4]) && array_search(array_keys($valores)[0], $orden) - array_search(array_keys($valores)[4], $orden) == 4) {
        $resultado = "Escalera";
    // Trío: 3 cartas del mismo valor
    } elseif (in_array(3, $valores)) {
        $resultado = "Trío";
    // Doble par: 2 pares de cartas del mismo valor
    } elseif (count(array_keys($valores, 2)) == 2) {
        $resultado = "Doble par";
    // Par: 2 cartas del mismo valor
    } elseif (in_array(2, $valores)) {
        $resultado = "Par";
    // Carta alta: ninguna de las combinaciones anteriores
    } else {
        $resultado = "Carta alta";
    }
    // Mostramos por pantalla el resultado obtenido
    echo "La mejor combinación posible es: " . $resultado;
}

// Generamos un arreglo con 5 cartas aleatorias
$cartas = repartirCartas($mazo);
// Mostramos las cartas por pantalla
mostrarCartas($cartas);
// Evaluamos la mejor combinación de cartas y mostramos el resultado obtenido
evaluarMano($cartas);

?>

