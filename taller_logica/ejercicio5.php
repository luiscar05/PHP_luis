<?php
function Primos($numero){

    if ($numero<=1) {
    return  false;
    }    
    for ($i=2; $i <= sqrt($numero) ; $i++) { 
        if ($numero%$i===0) {
            return false;      
        } 
    }
return true; 
}
$numero=intval(readline(prompt:"Ingrese un numero "));   
if (Primos($numero)) {
    echo "El numero es primo";
}else{
    echo "El numero no es primo";
}
?>