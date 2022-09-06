<?php

include 'usuario.php';


    $documento = $_POST["ndocumento"];
    $contraseña = $_POST["contraseña"];
    $vcontraseña = $_POST["vcontraseña"];


    if($contraseña == $vcontraseña){
       
        $usuario = new usuario();
        $usuario->crear_usuario($documento,$contraseña);
        
  }  

?>