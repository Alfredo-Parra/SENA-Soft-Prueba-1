<?php

include '../model/usuario.php';
//print_r($_POST);
session_start();

$n_documento = $_POST['ndocumento'];
$contraseña = $_POST['contraseña'];

$_SESSION['user'] = $n_documento;

$usuario = new usuario();

$usuario->iniciar_sesión($n_documento,$contraseña);


?>