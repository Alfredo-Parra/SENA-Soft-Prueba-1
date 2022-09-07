<?php

    SESSION_START();

    $user = $_SESSION['user'];
    print( $_POST['oculto']);

    include '../model/usuario.php';

    print($user);

    print_r($_POST);

    for($i = 1;$i < count($_POST); $i++){
        
        $usuario = new usuario();

       $usuario->registrar_respuesta($_POST['oculto'],$user,$i,$_POST[$i]);

    }

    

?>