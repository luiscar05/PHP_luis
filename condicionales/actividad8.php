<?php
$palabra = readline("Ingrese una cadena de texto");
$longitud= strlen($palabra)
$respuesta= match(true){
    $longitud>=10 => "La cadena es muy larga ",
    $longitud>=5 && $longitud<10 => "La cadena tiene un tamaño adecuado",
    $longitud>=0 && $longitud<5 => "la cadena es muy corta",
    default=>"Invalido"
};
echo $respuesta;
?>