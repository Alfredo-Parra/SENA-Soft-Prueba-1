<?php

if (!empty($_POST)) {
  if (isset($_POST["export_data"]) && isset($_POST["tema"])) {
    $datos = unserialize($_POST["export_data"]);
    $timestamp = time();
    $filename = "Export_" . $_POST["tema"] . "_" . $timestamp . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=" . $filename);
    // header("Content-Disposition: attachment; filename=\"$filename\"");

    $mostrar_columnas = false;

    foreach ($datos as $dato) {
      if (!$mostrar_columnas) {
        echo implode("\t", array_keys($dato)) . "\n";
        $mostrar_columnas = true;
      }
      echo implode("\t", array_values($dato)) . "\n";
    }
  } else {
    echo 'No hay datos a exportar';
  }
  exit();
}

?>
