<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../scss/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <?php

  session_start();

  $admin = $_SESSION['user'];

  ?>

</head>

<body style="background: #EEEDEA">


                
  <header class="p-3 bg-primary text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="principal_usuario.php" class="nav-link px-2 text-dark">Inicio</a></li>
          <li><a href="sondeos_participados.php" class="nav-link px-2 text-white">Sondeos Participados</a></li>
          <li><a href="resultados_sondeos.php" class="nav-link px-2 text-white">Resultados de Sondeos</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Verificar Datos</a></li>

        </ul>



        <div class="text-end">
          <a href="../../controller/cerrar_sessión.php"><button type="button" class="btn btn-warning">Cerrar Sesión <i class="bi bi-box-arrow-in-right"></i></button></a>
        </div>
      </div>
    </div>
  </header>

  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>

  <div class="container ">
    <div class="row justify-content-center">
      


<?php

include_once "../../model/conexión.php";
$sondeo = $bd->query("select * from participación_sondeo WHERE ID_USUARIO = $admin");
$r_sondeo = $sondeo->fetchAll(PDO::FETCH_OBJ);


foreach ($r_sondeo as $dato) {
 
    

?>

<div class="col">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card">
          <div class="card-header bg-primary text-light fs-4 text-center">Id Sondeo: <?php echo $dato->ID_SONDEO ?></div>
          <div class="card-body">
            <p class="card-text text-center">Identifiación de Usuario: <?php echo $dato->ID_USUARIO ?></p>
            <p class="text-center text-primary">-----------------------------</p>

          
            <div class="card-footer bg-transparent border-primary text-end"><a href="../../controller/verificación_radicado.php?ID=<?php echo $dato->ID ?>"><button class="btn btn-primary text-light">Generar Radicado</button></a></div>
          </div>
        </div>
      </div>
    </div>
   


  <?php
  }



?>

          
  </div>
  </div>



</body>

</html>