<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados Sondeos</title>
  <link rel="stylesheet" href="../scss/custom.css">
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
          <li><a href="../vista/administrador/principal_administrador.php" class="nav-link px-2 text-dark">Inicio</a></li>
          <li><a href="../vista/administrador/crear_sondeo.php" class="nav-link px-2 text-white">Crear Sondeo</a></li>
          <li><a href="../vista/administrador/resultados_sondeos.php" class="nav-link px-2 text-white">Resultados Sondeo</a></li>

        </ul>



        <div class="text-end">
          <a href="cerrar_sessión.php"><button type="button" class="btn btn-warning">Cerrar Sesión <i class="bi bi-box-arrow-in-right"></i></button></a>
        </div>
      </div>
    </div>
  </header>

  <p>
    <p>

    </p>
  </p>

  <?php

// Validación de datos enviados

      $id_sondeo = $_GET["ID"];
        include '../model/sondeo.php';
       
        

        $proceso = $GLOBALS['bd']->query("SELECT respuestas_preguntas_sondeo.Respuesta Respuestas_Opcionales,
        respuestas_preguntas_sondeo.ID_Pregunta ID_Pregunta,
        pregunta_sondeo.Pregunta,
        (SELECT COUNT(Respuesta)
        FROM respuestas_usuario
        WHERE ID_Pregunta = pregunta_sondeo.ID
        AND Respuesta = respuestas_preguntas_sondeo.Respuesta) Cantidad_Respuestas
          FROM
              respuestas_preguntas_sondeo
          INNER JOIN pregunta_sondeo ON pregunta_sondeo.ID = respuestas_preguntas_sondeo.ID_Pregunta
          WHERE pregunta_sondeo.ID_SONDEO = $id_sondeo");
        $rs = $proceso->fetchAll(PDO::FETCH_OBJ);

        ?>



<div class="container ">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card border-primary text-primary text-center">
          <div class="card-header fs-4 bg-primary text-light">
            REPORTE
          </div>
          <div class="p-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Pregunta</th>
                  <th scope="col">Repuestas opcionales</th>
                  <th scope="col">Cantidad de respuestas</th>
                </tr>
              </thead>

              <?php
              
        foreach($rs as $dat){
              ?>

                <tbody>
                  <tr>
                    <th scope="row"><?php echo $dat->Pregunta; ?></th>
                    <td><?php echo $dat->Respuestas_Opcionales; ?></td>
                    <td><?php echo $dat->Cantidad_Respuestas; ?></td>
                  </tr>


<?php
        }


?>

              </tbody>
            </table>
          </div>
        </div>
      </div>


      </div>
    </div>







</body>

</html>

