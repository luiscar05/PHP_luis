<?php
echo("01=Enero \n"."02=Febrero \n"."03=Marzo \n"."03=Marzo \n"."04=Abril \n"."05=Mayo \n"."06=Junio \n"."07=Julio \n"."08=Agosto \n"."09=Septiembre \n"."10=Octubre \n"."11=Noviembre \n"."12=Diciembre \n");
$fecha=readline("Ingrese una fecha (dia-mes)");
$respuesta = match($fecha){
    '14-02'=>"Día de San Valentín",
    '08-03'=>"Día Internacional de la Mujer",
    '22-04'=>"Día de la Tierra",
    '08-05'=>"Día de la Madre",
    '12-06'=>"Festival Folclórico y Reinado Nacional del Bambuco / Celebración San Pedro y San Juan - Neiva - Huila ",
    '16-06'=>"Reinado Nacional de la Ganadería - Montería, Córdoba",
    "28-06"=>"Reinado Nacional del Bambuco - Neiva, Huila",
    "20-07"=> "Dia de la independencia",
    "31-10"=>"Halloween",
    "25-12"=>"Navidad",
    "01-01"=>"Año nuevo",
    default =>"aun no Esta esta fecha"
};
echo $respuesta;
?>