<?php
function FierroALV(){
    for ($i=1; $i <=100 ; $i++) { 
        if ($i%3==0&&$i%5==0) {
            echo "PesoPluma ";
        }elseif ($i%3==0) {
            echo "peso ";
       }elseif ($i%5==0) {
        echo "Pluma ";
        
       }elseif ($i%3==0&&$i%5==0) {
        echo "Peso";
       }else{
        echo "$i  ";
       }
    }
}
echo FierroALV();
?>