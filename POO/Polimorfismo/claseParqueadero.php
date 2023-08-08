<?php
class Parqueadero {
// propiedades

protected $Ubicacion=[
    "Piso 1"=>["1","2","3","4","5","6","7","8","9","10"],
    "Piso 2"=>["1","2","3","4","5","6","7","8","9","10"],
    "Piso 3"=>["1","2","3","4","5","6","7","8","9","10"],
    "Piso 4"=>["1","2","3","4","5","6","7","8","9","10"],
];
private $HoraIngreso;
private $HoraSalida;
protected $Precio = 2;


function __construct(){
    
}

public function setIngreso(float $hora){
    $this->HoraIngreso = $hora;
}
public function getIngreso(){
    return $this->HoraIngreso;
}
public function setSalida(float $hora){
    $this->HoraSalida = $hora;
}
public function getSalida(){
    return $this->HoraSalida;
}
public function getPrecioPago(){
    $total = ($this->HoraSalida - $this->HoraIngreso) * $this->Precio;
    return $total;
}
public function getCitio(){
    
    $UbicacionReal = [];
    /*  for ($i=0; $i < 1; $i++) { 
            $piso = array_rand($this->Ubicacion);
            $Puesto = $this->Ubicacion[$piso][array_rand($this->Ubicacion[$piso])];
            $UbicacionParcial = $piso . " el Puesto " . $Puesto;
            $UbicacionReal[] = $UbicacionParcial;
            unset($this->Ubicacion[$piso][array_search($Puesto, $this->Ubicacion[$piso])]);
            if (count($this->Ubicacion[$piso]) == 0) {
                unset($this->Ubicacion[$piso]);
            }
        } */
        $i=0;
        while($i<1){
            $piso = array_rand($this->Ubicacion);

            if(!empty($this->Ubicacion[$piso])){
                $Puesto = $this->Ubicacion[$piso][array_rand($this->Ubicacion[$piso])];
                $UbicacionParcial = $piso . " en  el Puesto " . $Puesto;
                $UbicacionReal[] = $UbicacionParcial;
                unset($this->Ubicacion[$piso][array_search($Puesto, $this->Ubicacion[$piso])]);
                if (count($this->Ubicacion[$piso]) == 0) {
                    unset($this->Ubicacion[$piso]);
                }
                $mostrarUbi=implode( $UbicacionReal );
            }
            else{
                break;
            }
            
            $i++;
        }
        return $mostrarUbi;   
    }   
}
    

?>