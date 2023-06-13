<?php
$lista=readline(prompt:"ingrese la cantidad de ");
$notas=[];
$sum=0;
for ($a=1; $a <= $lista; $a++) { 
    $notas[$a-1]=floatval(readline(prompt:"Ingrese la nota $a \n"));
    $sum+=$notas[$a-1];
}
$prom= $sum/$lista;
echo "El promedio de ls umeros ingresados es $prom";
?>