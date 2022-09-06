<?php

// print_r($_POST);

if (!empty($_POST)) {
  if (isset($_POST["documento"]) && isset($_POST["ndocumento"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["sexo"]) && isset($_POST["celular"]) && isset($_POST["fijo"]) && isset($_POST["mail"]) && isset($_POST["municipio"]) && isset($_POST["direccion"]) && isset($_POST["barrio"])) {

    if ($_POST["documento"] != "" && $_POST["ndocumento"] != "" && $_POST["nombre"] != "" && $_POST["apellido"] != "" && $_POST["sexo"] != "" && $_POST["celular"] != "" && $_POST["fijo"] != "" && $_POST["mail"] != "" && $_POST["municipio"] != "" && $_POST["direccion"] != "" && $_POST["barrio"] != "") {

      include_once "../model/usuario.php";
      $usuario = new usuario();

      $usuario->agregar_usuario("$_POST[documento]", "$_POST[ndocumento]", "$_POST[nombre]", "$_POST[apellido]", "$_POST[sexo]", "$_POST[celular]", "$_POST[fijo]", "$_POST[mail]", "$_POST[municipio]", "$_POST[direccion]", "$_POST[barrio]", "$_POST[fecha_nacimiento]", "$_POST[Etnia]", "$_POST[discapacidad]", "$_POST[estrato]", "$_POST[nivel_educativo]", "$_POST[p_dispositivos]", "$_POST[dispositivos]", "$_POST[conectividad]");

      header("../vista/usuario/registrar_usuario.html");
      exit();
    };
  }
}

?>
