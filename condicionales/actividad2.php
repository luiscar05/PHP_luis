<?php
$color = readline("Ingrese el nombre de un color: ");

$mensaje = match ($color) {
    'rojo' => "El color rojo simboliza pasión y energía.",
    'azul' => "El color azul representa tranquilidad y serenidad.",
    'verde' => "El color verde está asociado con la naturaleza y la esperanza.",
    'amarillo' => "El color amarillo evoca alegría y energía positiva.",
    default => "No conozco ese color."
};

echo $mensaje;
?>