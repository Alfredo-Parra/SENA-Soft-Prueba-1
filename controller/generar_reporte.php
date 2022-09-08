<?php

// Validación de datos enviados
  if (!empty($_POST)) {
    if (isset($_POST["id_sondeo"])) {
      // Declaración de variables
      $id_sondeo = $_POST["id_sondeo"];

      if ($id_sondeo != "" && $id_sondeo > 0) {
        $sondeo = new sondeo();
        $reporte = $sondeo->generar_reporte($id_sondeo);

      } else {
        echo "Ocurrió un error al generar el reporte, los campos no pueden llegar vacíos";
      }
    } else {
      echo "Ocurrió un error al generar el reporte, algunos campos no se recibieron";
    }
  } else {
    echo "Ocurrió un error al generar el reporte, no se recibieron los datos";
  }
?>
