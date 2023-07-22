<?php

function calcularEscala($medida)
{
    // Separar los metros y centímetros de la cadena de entrada
    preg_match('/(\d+)m/', $medida, $metros_matches);
    preg_match('/(\d+)cm/', $medida, $centimetros_matches);

    // Obtener los valores de metros y centímetros
    $metros = isset($metros_matches[1]) ? (int)$metros_matches[1] : 0;
    $centimetros = isset($centimetros_matches[1]) ? (int)$centimetros_matches[1] : 0;

    // Convertir los metros a centímetros y sumar los centímetros adicionales
    $total_centimetros = $metros * 2  + $centimetros;


    return $total_centimetros;
}

// Ejemplos de uso:
echo("Especifipe Las Medidas De la Pared con 'm' para metros y 'cm' para centimetros \n");
$medida1 = readline("Ingrese las Medidas de la pared de alto "); 
$medida2 = readline("Ingrese las Medidas de la pared de largo ");    

$resultado1 = calcularEscala($medida1);
$resultado2 = calcularEscala($medida2);

echo "Resultado 1: " . $resultado1 . " centímetros\n";
echo "Resultado 2: " . $resultado2 . " centímetros\n";

?>
