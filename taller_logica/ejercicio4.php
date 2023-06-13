<?php
$palabra=readline(prompt:"Ingrese una Palabra \n");
$reversa = strrev($palabra);
    if ($palabra===$reversa) {
        echo "La palabra es un Polindromo";
    }else {
        echo "La palabra no es un Polindromo";
    }

?>