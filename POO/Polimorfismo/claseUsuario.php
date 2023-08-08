<?php
require_once ("claseVehiculo.php");
final class Usuario extends Vehiculo {
    private $identificacion;
    private $nombre;

    function __construct(int $cedula, string $nombre,string $placaCar,string $MarcaCar, string $ColorCar) {
        parent::__construct($placaCar,$MarcaCar,$ColorCar);
        $this->identificacion = $cedula;
        $this->nombre = $nombre;
    }



    public function getInfoUsuario() {
        $Usuario = $this->nombre . " con una identificacion numero " . $this->identificacion;
        return $Usuario;
    } 
}
?>