<?php

if (!empty($_POST)) {
  if (isset($_POST["documento"]) && isset($_POST["ndocumento"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["lugar_nacimiento"]) && isset($_POST["fecha_documento"]) && isset($_POST["lugar_documento"]) && isset($_POST["mail"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])) {
    if ($_POST["documento"] != "" && $_POST["ndocumento"] != "" && $_POST["nombre"] != "" && $_POST["apellido"] != "" && $_POST["fecha_nacimiento"] != "" && $_POST["lugar_nacimiento"] != "" && $_POST["fecha_documento"] != "" && $_POST["lugar_documento"] != "" && $_POST["mail"] != "" && $_POST["telefono"] != "" && $_POST["direccion"] != "") {
      include "conexion.php";

      $sql = "INSERT INTO usuario(Tipo_Documento,Número de Documento,Nombres Completos,Apellidos,Sexo,Teléfono_Celular, Teléfono_Fijo, Correo_Electrónico, Municipio, Dirección, Barrio-Vereda, Fecha_Nacimiento, Etnia, Condición_Discapacidad, Estrato_Residencia, U_Nivel_Educativo, Acceso_Dispositivos_E, Dispositivos_Tecnológicos, Conectividad_Internet) value (\"$_POST[documento]\",\"$_POST[ndocumento]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[fecha_nacimiento]\",\"$_POST[documento]\",\"$_POST[ndocumento]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[fecha_nacimiento]\",\"$_POST[documento]\",\"$_POST[ndocumento]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[fecha_nacimiento]\"";
      $query = $con->query($sql);
      if ($query != null) {
        print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
      } else {
        print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";
      }
    }
  }
}
