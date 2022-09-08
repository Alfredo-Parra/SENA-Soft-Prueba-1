<?php

include "conexión.php";

class sondeo
{

  public function agregar_sondeo($fi,$ff,$r,$t)
  {
    $proceso = $GLOBALS['bd']->prepare("INSERT INTO creación_sondeo (fecha_inicio,fecha_final,Restricción,Tema) VALUES (?,?,?,?)");
    $resultado = $proceso->execute([$fi,$ff,$r,$t]);
    

    if ($resultado === TRUE) {

      $sondeo = new sondeo();
      $sondeo->obtener_id($fi,$ff,$r,$t);


    
    } else {
      header("Location: ../vista/resgistrar_usuario.html?mensaje=error");
      exit();
    }
  }

  public function obtener_id($fi,$ff,$r,$t){
    $proceso = $GLOBALS['bd']->query("SELECT * FROM creación_sondeo WHERE fecha_inicio = '$fi' AND fecha_final = '$ff' AND Tema = '$t'; ");
    $rs = $proceso->fetchAll(PDO::FETCH_OBJ);
    foreach($rs as $dato){
      $ID = $dato->ID;
     header("Location: ../vista/administrador/añadir_preguntas.php?ID=$ID");
     exit();
    }
    

    
    
}

  public function añadir_pregunta($id_sondeo,$pr){

    $proceso = $GLOBALS['bd']->prepare("INSERT INTO pregunta_sondeo (ID_SONDEO, Pregunta) VALUES (?,?)");
    $resultado = $proceso->execute([$id_sondeo,$pr]);

  }

  public function obtener_id_pregunta($id_sondeo,$pr){

    $PROCESO = $GLOBALS['bd']->query("SELECT * FROM pregunta_sondeo WHERE ID_SONDEO = $id_sondeo AND Pregunta = '$pr';");
    $rs = $PROCESO->fetchAll(PDO::FETCH_OBJ);

    foreach($rs as $dato){
      return $dato->ID;
    }
    
  }

  public function añadir_respuesta($id_pregunta,$res){

    $proceso = $GLOBALS['bd']->prepare("INSERT INTO respuestas_preguntas_sondeo (ID_Pregunta,Respuesta) VALUES (?,?);");
    $rs = $proceso->execute([$id_pregunta,$res]);

  }


}


 
?>
