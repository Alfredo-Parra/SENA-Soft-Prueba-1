
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

$user = $_SESSION['user'];
$GLOBALS['id'] = $_GET['ID'];
?>

</head>
<body>

<header class="p-3 bg-primary text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="principal_usuario.php" class="nav-link px-2 text-dark">Inicio</a></li>
              <li><a href="sondeos_participados.php" class="nav-link px-2 text-white">Sondeos Participados</a></li>
              <li><a href="resultados_sondeos.php" class="nav-link px-2 text-white">Resultados de Sondeos</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Verificar Datos</a></li>

            </ul>



            <div class="text-end">
                <a href="../../controller/cerrar_sessión.php"> <button type="button" class="btn btn-warning">Cerrar Sesión <i class="bi bi-box-arrow-in-right"></i></button></a>
            </div>
        </div>
    </div>
</header>

<div class="py-3 fs-3 "></div>
<div class="py-3 fs-3 "></div>
<div class="py-3 fs-3 "></div>

<?PHP

                    include_once "../../model/conexión.php";
                    $sondeo = $bd->query("select * from Creación_Sondeo where ID = $id;");
                    $r_sondeo = $sondeo->fetchAll(PDO::FETCH_OBJ);

                    $respuestas_usuario = $bd->query("select * from respuestas_usuario where ID_SONDEO = $id AND ID_Usuario = $user;");
                    $c_respuestas_u = $respuestas_usuario->fetchAll(PDO::FETCH_OBJ);

                    $c_r_u = count(($c_respuestas_u));

                    if($c_r_u > 1){
                        ?>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fs-3 bg-primary text-light text-center">
                        Lo sentimos ya has participado en la encuesta <i class="bi bi-emoji-frown"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-primary">Ya has registrado respuestas para esta encuesta</h5>
                        <p class="card-text">Puedes ir a mirar que otras encuestas hay, gracias por su atención.</p>
                        <a href="principal_usuario.php" class="btn btn-primary text-light">Ir a Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php


                    }else{
                        foreach($r_sondeo as $dato){

                            ?>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                <div class="card">

                    <form class="p-4" method="POST" action="../../controller/registrar_respuestas.php">


                        <?php

include_once "../../model/conexión.php";
$p_sondeo = $bd->query("select * from pregunta_sondeo where ID_SONDEO = $id;");
$pr_sondeo = $p_sondeo->fetchAll(PDO::FETCH_OBJ);

foreach($pr_sondeo as $preguntas){


    

                        ?>

                        <div class="mg-3">
                            <label class="form-label fs-4"><?php echo $preguntas->Pregunta?></label>
                               
                            
                            <?php 
                            
                            include_once "../../model/conexión.php";
                            
                            $r_sondeo = $bd->query("select * from respuestas_preguntas_sondeo where ID_Pregunta = $preguntas->ID;");

                            $rr_sondeo = $r_sondeo->fetchAll(PDO::FETCH_OBJ);

                            $contador = count($rr_sondeo);


                            if($contador > 1){

                                ?>
                        


                                <div class="mg-3">
                                    <select class="form-control" title="Fuente de plomo / Fonte de chumbo" name="<?php echo $preguntas->ID?>">

                                    <?php
                                
                                        foreach($rr_sondeo as $respuestas){

                                        
                                    ?>
                                        <option value="<?php echo $respuestas->Respuesta?>"><?php echo $respuestas->Respuesta?></option>
                                    <?php
                                        
                                        }         
                                    ?>
                                    </select>
                                </div>


                            <?php
                            }else{

                                ?>

                                <input type="text" class="form-control" name="<?php echo $preguntas->ID ?>" autofocus required>


                            <?php
                            }
                            ?>
                            
                            

                        </div>

                        

                        <?php
                        }
                        ?>


                        <?php
                        }
                        ?>

                        <p>

                        <div class="form-footer">
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="<?php echo $GLOBALS['id'] ?>">
                                <input type="submit" class="btn btn-primary text-white fs-4" value="Registrar Respuestas">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php 

                    }
    ?>
      

</body>
</html>
