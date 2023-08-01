<?php
require_once("clases.php");

class Empleados extends Persona {
    // Propiedades
    private $Puestos;

    function __construct(int $identificacion, string $nombreUser, int $edadUser) {
        parent::__construct($identificacion, $nombreUser, $edadUser);
    }

    public function setAsignarPuesto($puesto) {
        $this->Puestos = $puesto;
    }

    public function getPuesto() {
        return $this->Puestos;
    }
}
?>
