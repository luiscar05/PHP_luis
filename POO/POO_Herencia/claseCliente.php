<?php
require_once("clases.php");

class Cliente extends Persona {
    // Propiedades
    private $creditos;

    function __construct(int $identificacion, string $nombreUser, int $edadUser) {
        parent::__construct($identificacion, $nombreUser, $edadUser);
    }

    // Método para establecer los créditos del cliente
    public function setCreditos($credito) {
        $this->creditos = $credito;
    }

    // Método para obtener los créditos del cliente
    public function getCredito() {
        return $this->creditos;
    }
}
?>

