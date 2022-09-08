<?php

include '../model/sondeo.php';

print_r($_POST);

$GLOBALS['id'] = $_POST['oculto'];

$field_values_array = $_REQUEST['field_name'];

if(count($field_values_array) == 1){

    $sondeo = new sondeo();
    $sondeo->añadir_pregunta($_POST['oculto'],$field_values_array[0]);

    $IDENTIFICADOR = $GLOBALS['id'];
    header("Location: ../vista/administrador/añadir_preguntas.php?ID=$IDENTIFICADOR");
    
}else{

    for($i = 0; $i < count($field_values_array); $i++){


        if($i == 0){
            $pregunta = $field_values_array[$i];
        }else{
            $respuesta[$i-1] = $field_values_array[$i];
        }

    }

    
for($e=0; $e < 1; $e++){

    print(1);

    $sondeo = new sondeo();
    $sondeo->añadir_pregunta($GLOBALS['id'],$pregunta);

    for($t= 0; $t < count($respuesta);$t++){

        print(2);

        $sondeo2 = new sondeo();
        $id_pregunta = $sondeo2->obtener_id_pregunta($GLOBALS['id'],$pregunta);

        $sondeo3 = new sondeo();
        $sondeo3->añadir_respuesta($id_pregunta,$respuesta[$t]);

    }

}

$IDENTIFICADOR = $GLOBALS['id'];
header("Location: ../vista/administrador/añadir_preguntas.php?ID=$IDENTIFICADOR");
    


}


?>