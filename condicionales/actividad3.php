<?php
$letra=readline("Ingrese una letra ");
$respuesta = match($letra){
    'a','e','i', 'o','u'=>"Es una vocal",
    'b','c','d', 'f','g','h','j','k', 'l','m','n','ñ','p','q','r', 's','t','v','w','x', 'y','z'=>"Es una Consonante",
    default=>"No es una letra"
};
echo $respuesta;
?>