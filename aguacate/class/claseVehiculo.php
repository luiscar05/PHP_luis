<?php
require_once("claseParqueadero.php");
require_once("./data/conexion.php");
class Vehiculo extends Parqueadero{
    private $placa;
    private $marca;
    private $color;


    function __construct(string $placaCar,string $MarcaCar, string $ColorCar){
        parent::__construct();
        $this->placa=$placaCar;
        $this->marca=$MarcaCar;
        $this->color=$ColorCar;
    }

    public function setInsertarCar($conexion) {
        try {
           $sqlVehiculo = "INSERT INTO vehiculo (palca, marca, color) VALUES (:plac, :mar, :col)";
           $inserta = $conexion->prepare($sqlVehiculo);
           $arrData = array(":ced" => $this->placa,
                            ":tip" => $this->marca,
                            ":nom" => $this->color,
           );
           $resInserta = $inserta->execute($arrData);
           //$idInsert = $this->conexion->lastInsertId();
           $inserta->closeCursor();
           /* return $idInsert; */
        } catch (Exception $t) {
            echo "Error" . $t->getMessage();
        }
    }
    public function getCarPlaca(){
       return $this->placa;
    }
    public function getColor(){
        return $this->color;
    }
    public function getMarca(){
        return $this->marca;
    }
    
}
?>