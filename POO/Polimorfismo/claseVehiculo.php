<?php
require("clasePaqueadero.php");
class Vehiculo extends Parqueadero{
    private $placa;
    private $marca;
    private $color;


    function __construct(int $Piso, int $numLugar,string $placaCar,string $MarcaCar, string $ColorCar){
        parent::__construct($piso,$numLugar);
        $this->$placa=$placaCar;
        $this->$marca=$MarcaCar;
        $this->$color=$ColorCar;
    }

    public function getUbicacion(){
        $ubicacion=[
            "Vehiculo"=""
        ]
    }
}
?>