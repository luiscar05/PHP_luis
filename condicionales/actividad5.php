<?php
echo ("1=Lunes \n"."2=Martes \n"."3=Mircoles \n"."4=Jueves \n"."5=Viernes \n"."6=Sabado \n"."7=Domingo \n");
$dia=readline("Ingrese un numero ");
$respuesta = match($dia){
   '1'=>"Lunes",
   '2'=>"Martes",
   '3'=>"Miercoles",
   '4'=>"Jueves",
   '5'=>"Viernes",
   '6'=>"Sabado",
   '7'=>"Domingo",
    default =>"aun no Esta esta fecha"
};
echo $respuesta;
?>