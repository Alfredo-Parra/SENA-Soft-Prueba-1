<?php
if (!empty($_POST)) {
  if (isset($_POST["radicado"])) {
    // Declaración de variables
    $radicado = $_POST["radicado"];

    if ($radicado != "") {
      $usuario = new usuario();
      $usuario->buscar_certificado($radicado);

    } else {
      echo "Ocurrió un error al buscar el certificado, los campos no pueden llegar vacíos";
    }
  } else {
    echo "Ocurrió un error al buscar el certificado, algunos campos no se recibieron";
  }
} else {
  echo "Ocurrió un error al buscar el certificado, no se recibieron los datos";
}
?>
