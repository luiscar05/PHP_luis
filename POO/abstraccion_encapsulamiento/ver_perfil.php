<?php

require_once ("claseUsuario.php");

$Usuario1=new Usuario("Luis","penaabellaluiscarlos@gmail.com","Aprendiz","1");
$clave=$Usuario1->cambiar_clave("1083869916");
$confirmarClave= $Usuario1->getClaveNueva();
$Perfil_Usuario1=$Usuario1-> ver_perfil();

echo $Perfil_Usuario1;

$Usuario2=new Usuario("Mauricio","penaabellaMauricio@gmail.com","Aprendiz","9999");
$clave= $Usuario2->cambiar_clave("999");
$confirmarClave= $Usuario2->getClaveNueva();
$Perfil_Usuario2= $Usuario2-> ver_perfil();

echo $Perfil_Usuario1;