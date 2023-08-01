<?php
class Parqueadero{
    // propiedades

    private $numPiso;
    private $Lugar;
    private $HoraIngreso;
    private $HoraSalida;
    protected $Precio =2


    function __construct(int $Piso, int $numLugar){
        $this->numPiso = $Piso;
        $this->Lugar =  $numLugar;
    }

    public function setIngreso(float $hora){
        $this->$HoraIngreso=$hora;
    }
    public function getIngreso(){
        return $this->$HoraIngreso;
    }
    public function setSalida(float $hora){
        $this->$HoraSalida=$hora;
    }
    public function getSalida(){
        return $this->$HoraSalida;
    }
    public function getPrecioPago(){
        $total=($this->$HoraIngreso%$this->$HoraSalida)*2;
        $this->$precio=$total;
        return $this->$precio;
    }
}
?>