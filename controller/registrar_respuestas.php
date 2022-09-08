<?php

    SESSION_START();

    $id_usuario = $_SESSION['user'];
    print( $_POST['oculto']);

    include '../model/usuario.php';


    print_r($_POST);

    foreach($_POST as $dato => $valor){



        if($dato == 'oculto'){

            $GLOBALS['identificador'] = $dato;

        }else{

            $p = 0;
            $p++;

            $i_p= count($_POST) - $p;

        }


        $key = array_key_first($_POST);
    

        $primer = $key;
      
     
        

        
    }


    for($i = 0;$i < (count($_POST) - 1); $i++){
             
        $usuario = new usuario();
       $usuario->registrar_respuesta($_POST['oculto'],$id_usuario,$primer,$_POST[$primer]);

       $primer++;

      
    }

 
        date_default_timezone_set("America/Bogota");

        $fecha_actual = date("Y-m-d H:i:00", time());
    
        $user = new usuario();
        $user->agregar_participación($_POST['oculto'],$id_usuario,$fecha_actual);
    
        header ('Location: ../vista/usuario/principal_usuario.html');

       






?>