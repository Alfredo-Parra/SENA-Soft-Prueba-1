<?php

class administrador{

  public function iniciar_sesión($user,$con){

      $inicio = $GLOBALS['bd']->query("Select * FROM administrador where Usuario = $user AND Contraseña = $con");
      $resultado = $inicio->fetchAll(PDO::FETCH_OBJ);

      $contador = count($resultado);

    if($contador == 1){
        header ('Location: ../vista/administrador/principal_administrador.php');
    }
  }
}

?>
