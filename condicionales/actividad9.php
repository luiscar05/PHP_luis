<?php
$hora=readline("ingrese una hora (en formato de 24 horas HH:MM)");

$RESPUESTA =  match(true){
    $hora=='00:00' && $hora<'06:00'=>"Es de Madrugada",
    $hora>='06:00' && $hora<'12:00'=> "Mañana",
    $hora>='12:00'&& $hora<='18:00'=>"Tarde",
    $hora>'18:00' && $hora<='23:59'=>"Ya Es de noche",
    default=>"hora no reconocida "
};
echo $RESPUESTA;



?>