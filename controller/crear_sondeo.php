<?php

print_r($_POST);

$tema = $_POST['tema'];
$fecha_i = $_POST['fecha_i'];
$fecha_f = $_POST['fecha_f'];
$restricción = $_POST['restricción'];

include '../model/sondeo.php';

$sondeo = new sondeo();

$sondeo->agregar_sondeo($fecha_i,$fecha_f,$restricción,$tema);

?>
