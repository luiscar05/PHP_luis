<?php
class Usuario{
    //propiedades

    private $nombre;
    private $email;
    private $tipo;
    private $clave;


    function __construct (string $NombreUsuario, string $emailUsuario , string $tipoDocumento , string $contraseña){
        $this -> nombre = $NombreUsuario;
        $this -> email = $emailUsuario;
        $this -> tipo = $tipoDocumento;
        $this -> clave = $contraseña;
    }

   /*  public function getNombre(){
        return $this -> nombre;

        
    }
    public function getEmail(){
        return $this->email;
    }
    public function gettipo(){
        return $this->tipo;
    } */
    public function registrar(){

    }
    public function ver_perfil(){
        echo ("los datos del Usuaruio son " . "<br>");
        echo ("Nombre ".$this -> nombre."<br>");
        echo ("Email ".$this -> email."<br>");
        echo ("Tipo de Usuario ".$this -> tipo."<br>");
        echo ("clave ".$this->clave ."<br>");
        echo ("<br>"."<br>"."<br>");
        
    }
    public function cambiar_clave($claveNueva){
        $this -> clave = $claveNueva;
    }
    public function getClaveNueva(){
        $this->clave;
    }
}