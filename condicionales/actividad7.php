<?php
$nota = readline("Ingrese la nota numérica (0-100): ");

$mensaje = match (true) {
    $nota >= 90 && $nota <= 100 => "Excelente",
    $nota >= 80 && $nota < 90 => "Muy bueno",
    $nota >= 70 && $nota < 80 => "Bueno",
    $nota >= 60 && $nota < 70 => "Suficiente",
    $nota >= 0 && $nota < 60 => "Insuficiente",
    default => "Nota inválida"
};

echo $mensaje;
?>