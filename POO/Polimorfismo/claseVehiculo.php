<?php
require_once("claseParqueadero.php");
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