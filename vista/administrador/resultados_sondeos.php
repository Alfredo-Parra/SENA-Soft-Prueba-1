<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados Sondeos</title>
  <link rel="stylesheet" href="../../scss/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <?php

  session_start();

  $admin = $_SESSION['user'];

  ?>

</head>

<body>

  <header class="p-3 bg-primary text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="principal_administrador.php" class="nav-link px-2 text-dark">Inicio</a></li>
          <li><a href="crear_sondeo.php" class="nav-link px-2 text-white">Crear Sondeo</a></li>
          <li><a href="resultados_sondeos.php" class="nav-link px-2 text-white">Resultados Sondeo</a></li>

        </ul>
      </div>
    </div>
  </header>

  <p>
    <p>

    </p>
  </p>

        <div class="container ">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card border-primary text-primary text-center">
          <div class="card-header fs-4 bg-primary text-light">
            Sondeos Finalizados
          </div>
          <div class="p-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Fecha de Inicio</th>
                  <th scope="col">Fecha Final</th>
                  <th scope="col">Restricción</th>
                  <th scope="col">Generar Reporte</th>
                </tr>
              </thead>






              <?php

              include_once "../../model/conexión.php";
              $sondeo = $bd->query("select * from Creación_Sondeo");
              $r_sondeo = $sondeo->fetchAll(PDO::FETCH_OBJ);

               foreach ($r_sondeo as $dato) {
                date_default_timezone_set("America/Bogota");
              
                $fecha_actual = date("Y-m-d H:i:00", time());
                $fecha_inicio = $dato->fecha_inicio;
                $fecha_final = $dato->fecha_final;
              
                
                if ($fecha_actual > $fecha_final) {
                  
              
              
              ?>





                <tbody>
                  <tr>
                    <th scope="row"><?php echo $dato->ID; ?></th>
                    <td><?php echo $dato->fecha_inicio; ?></td>
                    <td><?php echo $dato->fecha_final; ?></td>
                    <td><?php echo $dato->Restricción; ?></td>
                    <td><a href="../../controller/generar_reporte.php?ID=<?php echo $dato->ID ?>"><button class="btn btn-primary text-light">Generar</button></a></td>
                  </tr>

                <?php
              }
            }
          
                ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>





        <div class="text-end">
          <a href="../../controller/cerrar_sessión.php"><button type="button" class="btn btn-warning">Cerrar Sesión <i class="bi bi-box-arrow-in-right"></i></button></a>
        </div>
      </div>
    </div>
  </header>

  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>






</body>

</html>
