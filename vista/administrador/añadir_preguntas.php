<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../scss/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <?php

  session_start();

  $admin = $_SESSION['user'];

  $GLOBALS['id'] = $_GET['ID'];

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
            <li><a href="principal_administrador.php" class="nav-link px-2 text-dark">Volver a Inicio</a></li>
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
                <form class="p-4" method="POST" action="../../controller/ingresar_preguntas.php">
              
                <div class="field_wrapper">
                        <div">
                            <label class="form-label  fs-5">Ingrese la pregunta</label>
                            <p></p>
                            <input type="text" name="field_name[]" value=""/>
                            <a href="javascript:void(0);" class="add_button" title="Add field"><i class="bi bi-plus-circle"></i></a>
                            <p></p>
                        </div>
                </div>


                    <script type="text/javascript">
                        $(document).ready(function(){
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('.add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div><label class="form-label  fs-5">Ingrese la Respuesta, elimina la casilla para pregunta abierta</label><p></p><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="bi bi-x-circle"></i><p></p>'; //New input field html 
                            var x = 1; //Initial field counter is 1
                            $(addButton).click(function(){ //Once add button is clicked
                                if(x < maxField){ //Check maximum number of input fields
                                    x++; //Increment field counter
                                    $(wrapper).append(fieldHTML); // Add field html
                                }
                            });
                            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                                e.preventDefault();
                                $(this).parent('div').remove(); //Remove field html
                                x--; //Decrement field counter
                            });
                        });
                    </script>



                <p>
                  <p>

                  </p>
                </p>
            

                <div class="form-footer">
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="<?php echo $GLOBALS['id']?>">
                                <input type="submit" class="btn btn-primary text-white fs-4" value="Siguiente">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        </div>




        <p>
            <p>
                
            </p>
        </p>



        <div class="container ">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card border-primary text-primary text-center">
          <div class="card-header fs-4 bg-primary text-light">
            Preguntas Añadidas
          </div>
          <div class="p-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">ID_Sondeo</th>
                  <th scope="col">Preguntas</th>
                </tr>
              </thead>


        <?php

            $identificador = $GLOBALS['id'];
            include_once "../../model/conexión.php";
            $sondeo = $bd->query("select * from pregunta_sondeo where ID_SONDEO = $identificador");
            $r_sondeo = $sondeo->fetchAll(PDO::FETCH_OBJ);

            foreach ($r_sondeo as $dato) {
                $contador = count($r_sondeo);


              ?>


                <tbody>
                  <tr>
                    <th scope="row"><?php echo $dato->ID; ?></th>
                    <td><?php echo $dato->ID_SONDEO; ?></td>
                    <td><?php echo $dato->Pregunta; ?></td>
                  </tr>

                <?php
              }
                ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>




        

  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>
  <div class="py-3 fs-3 "></div>






</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</html>
