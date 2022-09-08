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
          <li><a href="#" class="nav-link px-2 text-white">Resultados Sondeo</a></li>

        </ul>
        <div class="text-end">
          <a href="../../controller/cerrar_sessión.php"><button type="button" class="btn btn-warning">Cerrar Sesión <i class="bi bi-box-arrow-in-right"></i></button></a>
        </div>
      </div>
    </div>
  </header>


        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <form class="p-4" method="POST" action="../../controller/crear_sondeo.php">
              
                <div class="mg-3">
                     <label class="form-label  fs-4">Tema de la encuesta</label>
                     <input type="text" class="form-control" name="tema" autofocus required>
                </div>

                <div class="mg-3">
                     <label class="form-label  fs-4">Fecha Inicio</label>
                     <input type="datetime-local" step="1" class="form-control" name="fecha_i" autofocus required>
                </div>

                <div class="mg-3">
                     <label class="form-label  fs-4">Fecha Final</label>
                     <input type="datetime-local" step="1" class="form-control" name="fecha_f" autofocus required>
                </div>

                <div class="mg-3">
                     <label class="form-label  fs-4">Restricción</label>
                     <input type="text" class="form-control" name="restricción" autofocus required>
                </div>




                <p>
                  <p>

                  </p>
                </p>

                <div class="form-footer">
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-primary text-white fs-4" value="Siguiente">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        </div>




        

  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>






</body>

</html>
