<?php

if (!empty($_POST)) {
  if (isset($_POST["documento"]) && isset($_POST["ndocumento"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["lugar_nacimiento"]) && isset($_POST["fecha_documento"]) && isset($_POST["lugar_documento"]) && isset($_POST["mail"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])) {
    if ($_POST["documento"] != "" && $_POST["ndocumento"] != "" && $_POST["nombre"] != "" && $_POST["apellido"] != "" && $_POST["fecha_nacimiento"] != "" && $_POST["lugar_nacimiento"] != "" && $_POST["fecha_documento"] != "" && $_POST["lugar_documento"] != "" && $_POST["mail"] != "" && $_POST["telefono"] != "" && $_POST["direccion"] != "") {
      include_once "usuario.php";

      $usuario = new usuario();

      $usuario -> agregar_usuario("$_POST[documento]","$_POST[ndocumento]","$_POST[nombre]","$_POST[apellido]","$_POST[sexo]","$_POST[celular]","$_POST[fijo]","$_POST[mail]","$_POST[municipio]","$_POST[direccion]","$_POST[barrio]","$_POST[fecha_nacimiento]","$_POST[Etnia]","$_POST[discapacidad]","$_POST[estrato]", "$_POST[nivel_educativo]","$_POST[p_dispositivos]","$_POST[dispositivos]","$_POST[conectividad]");
  }
}
}
