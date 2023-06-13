<?php
function calcularDescuento(float $precio,float $descuento){
    $descuentoTotal=$precio*($descuento/100);
    $precioTotal=$precio-$descuentoTotal;
    return $precioTotal;
}

$precio=readline("ingrese el precio del prducto  ");
$descuento=readline("ingrese el descuento del prducto  ");

echo calcularDescuento($precio,$descuento);
?>