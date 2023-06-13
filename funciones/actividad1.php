<?php

$valor1=readline("ingrese un texto ");
function esPalindromo(string $valor1){
    $palabra=strtolower($valor1);
    $palindromo = strrev($palabra);
    if ($palabra===$palindromo) {
      echo "la palabra ingresada es un palindromo";
    }else{
        echo "la palabra ingresada no es un palindromo";
    }
}

echo esPalindromo($valor1);
?>
