<?php
class Parqueadero {
// propiedades

private $HoraIngreso;
private $HoraSalida;
protected $Precio = 2;
private $usuario;
private $vehiculo;

function __construct(){
    
}



public function generarLugar($conexion) {
    $total_pisos = 4;
    $espacios_por_piso = 10;

    for ($piso = 1; $piso <= $total_pisos; $piso++) {
        for ($lugar = 1; $lugar <= $espacios_por_piso; $lugar++) {
            $ubicacion = "Piso $piso - Lugar $lugar";

            // Verifica si el lugar está ocupado
            $sqlCheck = "SELECT COUNT(*) as count FROM parqueadero WHERE ubicacion = :ubicacion";
            $checkStatement = $conexion->prepare($sqlCheck);
            $checkStatement->bindParam(':ubicacion', $ubicacion);
            $checkStatement->execute();
            $result = $checkStatement->fetch(PDO::FETCH_ASSOC);
            $count = intval($result['count']);
            $checkStatement->closeCursor();

            if ($count == 0) {
                // Asigna esta ubicación al lugar de parqueo
                $sqlUpdate = "INSERT INTO parqueadero (ubicacion) VALUES (:ubicacion)";
                $updateStatement = $conexion->prepare($sqlUpdate);
                $updateStatement->bindParam(':ubicacion', $ubicacion);
                $updateStatement->execute();
                $updateStatement->closeCursor();

                return $ubicacion; // Lugar asignado exitosamente
            }
        }
    }
    
    return "Parqueadero lleno"; // Si no se encuentra un lugar disponible
    $conexion->close();
}


}

 

?>