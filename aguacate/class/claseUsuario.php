<?php
require_once ("./class/claseVehiculo.php"); // Asegúrate de que claseVehiculo.php defina la clase Vehiculo
require_once("./class/claseParqueadero.php");
require_once("data/conexion.php");

final class Usuario extends Vehiculo {
    private $identificacion;
    private $tipoId;
    private $nombre;

    // datos del vehiculo
    private $placa;  // Agrega esta propiedad en la clase Usuario
    private $marca;  // Agrega esta propiedad en la clase Usuario
    private $color;  // Agrega esta propiedad en la clase Usuario
    

    function __construct(int $cedula, string $tipoId, string $nombre, string $placaCar, string $MarcaCar, string $ColorCar) {
        parent::__construct($placaCar, $MarcaCar, $ColorCar);
        $this->identificacion = $cedula;
        $this->tipoId = $tipoId;
        $this->nombre = $nombre;
        $this->placa = $placaCar;  // Inicializa la propiedad placa en Usuario
        $this->marca = $MarcaCar;  // Inicializa la propiedad marca en Usuario
        $this->color = $ColorCar;  // Inicializa la propiedad color en Usuario
    }

    public function setInsertar($conexion) {
        try {
            $sqlUser = "INSERT INTO usuario (identificacion, tipo_iden, nombre) VALUES (:ced, :tip, :nom)";
            $insertUser = $conexion->prepare($sqlUser);
            $arrUserData = array(":ced" => $this->identificacion,
                                 ":tip" => $this->tipoId,
                                 ":nom" => $this->nombre,
            );
            $resInsertUser = $insertUser->execute($arrUserData);
            //$idInsertUser = $conexion->lastInsertId();
            $insertUser->closeCursor();
        
            if ($this->placa && $this->marca && $this->color) {
                parent::__construct($this->placa, $this->marca, $this->color);

                $sqlVehiculo = "INSERT INTO vehiculo (placa, marca, color) VALUES (:plac, :mar, :col)";
                $insertVehiculo = $conexion->prepare($sqlVehiculo);
                $arrVehiculoData = array(":plac" => $this->placa,
                                         ":mar" => $this->marca,
                                         ":col" => $this->color,
                );
                $resInsertVehiculo = $insertVehiculo->execute($arrVehiculoData);
                //$idInsertVehiculo = $conexion->lastInsertId();
                $insertVehiculo->closeCursor();
            }

           //generar ubicacion 
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
                $sqlUpdate = "INSERT INTO parqueadero (hora_ingreso,ubicacion, fk_Usuario, fk_vehiculo) VALUES (now(),:ubicacion,:user,:vehiculo)";
                $updateStatement = $conexion->prepare($sqlUpdate);
                $updateStatement->bindParam(':ubicacion', $ubicacion);
                $updateStatement->bindParam(':user', $this->identificacion);
                $updateStatement->bindParam(':vehiculo',$this->placa, );
                $updateStatement->execute();
                $updateStatement->closeCursor();

                return $ubicacion; // Lugar asignado exitosamente
            }
        }
    }
    
    return "Parqueadero lleno";

            
    
        } catch (Exception $th) {
            echo "Error" . $th->getMessage();
        }
    }
    
    public function getUsuarios($conexion){
        try {
            $sql = "SELECT identificacion,nombre,hora_ingreso,ubicacion,placa,marca from parqueadero
            join usuario on fk_Usuario=identificacion
            join vehiculo on fk_vehiculo=placa";
            $execute = $conexion->query($sql);
            $request = $execute->fetchAll(PDO::FETCH_ASSOC);
    
            if ($request) {
                echo "<table>";
                echo "<thead>";
                echo "<th>ID</th><th>Nombre</th><th>Hora Ingreso</th><th> Ubicacion </th><th> Placa </th><th> Marca </th> ";
                echo "</thead>";
                foreach ($request as $fila) {
                    echo "<tr>";
                    echo "<td>{$fila['identificacion']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['hora_ingreso']}</td>";
                    echo "<td>{$fila['ubicacion']}</td>";
                    echo "<td>{$fila['placa']}</td>";
                    echo "<td>{$fila['marca']}</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "<h2> No se encontraron usuarios. </h2>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function BuscarUsuario(string $placa, $conexion) {
        try {
            $sql = "SELECT identificacion,nombre,hora_ingreso,ubicacion,placa,marca from parqueadero
            join usuario on fk_Usuario=identificacion
            join vehiculo on fk_vehiculo=placa WHERE placa = :placa";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(':placa', $placa, PDO::PARAM_STR);
            $statement->execute();
            $request = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            if ($request) {
                echo "<table>";
                echo "<thead>";
                echo "<th>ID</th><th>Nombre</th><th>Hora Ingreso</th><th> Ubicacion </th><th> Placa </th><th> Marca </th><th> Opciones...</th>";
                echo "</thead>";
                foreach ($request as $fila) {
                    echo "<tr>";
                    echo "<td>{$fila['identificacion']}</td>";
                    echo "<td>{$fila['nombre']}</td>";
                    echo "<td>{$fila['hora_ingreso']}</td>";
                    echo "<td>{$fila['ubicacion']}</td>";
                    echo "<td>{$fila['placa']}</td>";
                    echo "<td>{$fila['marca']}</td>";
                    echo '<td><a href="actualizar.php?upd=' . $fila['identificacion'].'">Actualizar...</a></td>';
                    echo "</tr>";

                }
                
                echo "</table>";
               /*  echo '<button class="actualizar"><a href="actualizar.php?upd<?=$r['busquedaVehiculo']?>">Actualizar...</a></button>'; */
            } else {
                echo "<h2> No se encontraron usuarios.</h2>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deleteUser(string $placa, $conexion) {
        try {
            // Obtener el ID del usuario desde la tabla 'parqueadero'
            $queryUserId = "SELECT fk_Usuario FROM parqueadero WHERE fk_vehiculo = :placa";
            $stmtUserId = $conexion->prepare($queryUserId);
            $stmtUserId->bindParam(':placa', $placa, PDO::PARAM_STR);
            $stmtUserId->execute();
            $usuarioIdFromParqueadero = $stmtUserId->fetchColumn();
    
            if (!$usuarioIdFromParqueadero) {
                return false; // No hay registros para eliminar, devuelve false
            }
    
            // Iniciar una transacción
          
    
            // Eliminar registros en la tabla 'parqueadero'
            $queryDeleteParqueadero = "DELETE FROM parqueadero WHERE fk_vehiculo = :placa";
            $stmtDeleteParqueadero = $conexion->prepare($queryDeleteParqueadero);
            $stmtDeleteParqueadero->bindParam(':placa', $placa, PDO::PARAM_STR);
            $stmtDeleteParqueadero->execute();
    
            // Eliminar registros en la tabla 'vehiculo'
            $queryDeleteVehiculo = "DELETE FROM vehiculo WHERE placa = :placa";
            $stmtDeleteVehiculo = $conexion->prepare($queryDeleteVehiculo);
            $stmtDeleteVehiculo->bindParam(':placa', $placa, PDO::PARAM_STR);
            $stmtDeleteVehiculo->execute();
    
            // Eliminar registros en la tabla 'usuario'
            $queryDeleteUsuario = "DELETE FROM usuario WHERE identificacion = :usuarioId";
            $stmtDeleteUsuario = $conexion->prepare($queryDeleteUsuario);
            $stmtDeleteUsuario->bindParam(':usuarioId', $usuarioIdFromParqueadero, PDO::PARAM_INT);
            $stmtDeleteUsuario->execute();
    
            // Confirmar la transacción si todas las operaciones fueron exitosas
           
    
            return true; // Indica que todo se completó correctamente
    
        } catch (Throwable $th) {
            // Si ocurre algún error, revertir la transacción y arrojar una excepción personalizada
            
            throw new Exception("Error al eliminar: " . $th->getMessage());
        } finally {
            // Cerrar la conexión a la base de datos
            $conexion = null;
        }
    }
    
    public function retirarUsuario(string $placa, $conexion) {
        $sql = "UPDATE parqueadero SET hora_salida = CURRENT_TIME WHERE fk_vehiculo = :placa;";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':placa', $placa, PDO::PARAM_STR);
        $statement->execute();
    }
    public function VerEliminado(string $placa, $conexion) {
        $sql = "SELECT identificacion, nombre, hora_ingreso, hora_salida, ubicacion, placa, marca
                FROM parqueadero
                JOIN usuario ON fk_Usuario = identificacion
                JOIN vehiculo ON fk_vehiculo = placa
                WHERE placa = :placa";
    
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':placa', $placa, PDO::PARAM_STR);
        $statement->execute();
        $request = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        if ($request) {
            echo "<table>";
            echo "<thead>";
            echo "<th>ID</th><th>Nombre</th><th>Hora Ingreso</th><th>Hora Salida</th><th>Ubicacion</th><th>Placa</th><th>Marca</th>";
            echo "</thead>";
    
            foreach ($request as $fila) {
                echo "<tr>";
                echo "<td>{$fila['identificacion']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['hora_ingreso']}</td>";
                echo "<td>{$fila['hora_salida']}</td>";
                echo "<td>{$fila['ubicacion']}</td>";
                echo "<td>{$fila['placa']}</td>";
                echo "<td>{$fila['marca']}</td>";
                echo "</tr>";
            }
            
            echo "</table>";
    
            // Calcular el tiempo transcurrido y el total a pagar
            $horaing = $request[0]['hora_ingreso'];
            $horaSal = $request[0]['hora_salida'];
    
            $inicio = new DateTime($horaing);
            $fin = new DateTime($horaSal);
            $totalhoras = $inicio->diff($fin);
            $horasTotales = $totalhoras->h + ($totalhoras->i / 60); // Convertir minutos a fracción de horas
            $pago = $horasTotales * 2; // Tarifa por hora
    
            $totalPago = "El total a pagar es: $pago USD";


            echo $totalPago;


            
        } else {
            echo "No se encontraron registros para la placa $placa";
        }
    }
    
    
    
    
    
      
}
?>
