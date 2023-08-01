<?php
class Persona {
    /* Propiedades */
    private $DPI;
    private $nombre;
    private $edad;

    function __construct(int $identificacion, string $nombreUser, int $edadUser) {
        $this->DPI = $identificacion;
        $this->nombre = $nombreUser;
        $this->edad = $edadUser;
    }

    // Métodos

    public function getDatosPersonales() {
        $datos = "
        <h1> Datos Personales </h1>
        <br>
        DPI: {$this->DPI}<br>
        Nombre: {$this->nombre}<br>
        Edad: {$this->edad}<br>
        ";

        return $datos;
    }
}
?>



