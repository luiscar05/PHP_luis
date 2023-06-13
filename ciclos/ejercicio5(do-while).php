<?php
echo "Ingrese la tabla de multiplicar que desea (1-12) \n ";
echo"</br>";
$num=7;
$a=0;
$resultado=0;
do {
    $resultado=$num*$a;
    echo "$num x $a = $resultado";
    echo"</br>";
    $a=$a+1;
} while ($a <= 10);
?>
