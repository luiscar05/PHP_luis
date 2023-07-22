<?php
function preomedios(){
    $notas=array()
    for ($i=0; $i <= 5; $i++) { 
        $nota=readline("ingrese la nota: ");
        $notas=$notas[$nota];
        $promedio=($notas[$i-1]+$notas[$i])/count($notas);
        return $promedio;
    }
    console.log("el numero de")
}

preomedios();