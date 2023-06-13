<?php
$resultado=0;
for ($i=1; $i <= 10 ; $i++) { 
    for ($a=1; $a <= 10; $a++) { 
        $resultado=$i*$a;
        echo "$i x $a = $resultado  ";
        echo "</br>";
    } 
    echo "</br>";
    echo "</br>";
}
?>