<?php


    session_start();

    $user_i = $_SESSION['user'];
    $GLOBALS['id'] = $_GET['ID'];



    include_once '../model/usuario.php';

    

    

        $user = new usuario();
        $rel = $user->verificacion_radicado($id,$user_i);



        print($rel);


?>