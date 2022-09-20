<?php

include "conexión.php";

class usuario{

    public function agregar_usuario($tp,$nd,$nc,$a,$s,$tc,$tf,$ce,$m,$dir,$bv,$fn,$e,$cd,$er,$unv,$ade,$de,$ci){
        $proceso = $GLOBALS['bd']->prepare("INSERT INTO `usuario` (`Tipo_Documento`, `Número de Documento`, `Nombres Completos`, `Apellidos`, `Sexo`, `Teléfono_Celular`, `Teléfono_Fijo`, `Correo_Electrónico`, `Municipio`, `Dirección`, `Barrio-Vereda`, `Fecha_Nacimiento`, `Etnia`, `Condición_Discapacidad`, `Estrato_Residencia`, `U_Nivel_Educativo`, `Acceso_Dispositivos_E`, `Dispositivos_Tecnológicos`, `Conectividad_Internet`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $resultado = $proceso->execute([$tp,$nd,$nc,$a,$s,$tc,$tf,$ce,$m,$dir,$bv,$fn,$e,$cd,$er,$unv,$ade,$de,$ci]);

        if($resultado === TRUE){
            header("Location: ../vista/usuario/crear_usuario.html");
            exit();
        }else{
            header("Location: ../vista/resgistrar_usuario.html?mensaje=error");
            exit();
        }

    }

    public function iniciar_sesión($user,$con){

        if($user == 192837465 || $con == 1234){

           include 'administrador.php';

           $administrador = new administrador();

           $administrador->iniciar_sesión($user,$con);

        }else{

            $inicio = $GLOBALS['bd']->query("Select * FROM inicio_sesión where Número_Documento = $user AND Contraseña = '$con'; ");
            $resultado = $inicio->fetchAll(PDO::FETCH_OBJ);

            $contador = count($resultado);

          if($contador == 1){
              header ('Location: ../vista/usuario/principal_usuario.php');
           }else{
                header ('Location: index.html?mensaje=error');
           }
        }

    }

    public function crear_usuario($documento,$contraseña){

        $registro = $GLOBALS['bd']->prepare("INSERT INTO inicio_sesión (Número_Documento,Contraseña) VALUES (?,?);");
        $resultado = $registro->execute([$documento,$contraseña]);

      if($resultado === TRUE){
          header ('Location: ../index.html');
       }
    }

    Public function registrar_respuesta($is,$iu,$ip,$ir){
        $registrar = $GLOBALS['bd']->prepare("INSERT INTO respuestas_usuario (ID_SONDEO, ID_USUARIO, ID_Pregunta, Respuesta) VALUES (?,?,?,?)");
        $resultado = $registrar->execute([$is,$iu,$ip,$ir]);

    }


    public function buscar_certificado($radicado){

        $certificado = $GLOBALS['bd']->query("SELECT
                                    CONCAT(radicados.radicado, LPAD(radicados.ID, 4, '0')) id_radicado,
                                    usuario.`Nombres Completos` Nombres,
                                    usuario.Apellidos Apellidos,
                                    usuario.Tipo_Documento,
                                    usuario.`Número de Documento` Número_Documento,
                                    creación_sondeo.Tema,
                                    radicados.`fecha_creación` Fecha_Radicado,
                                    creación_sondeo.`Creación_Sondeo` Fecha_Sondeo
                                FROM
                                    radicados
                                INNER JOIN creación_sondeo ON creación_sondeo.ID = radicados.id_sondeo
                                INNER JOIN usuario ON usuario.`Número de Documento` = radicados.id_usuario
                                WHERE
                                    CONCAT(radicados.radicado, LPAD(radicados.ID, 4, '0')) = '$radicado;");
        $resultado = $certificado->fetchAll(PDO::FETCH_OBJ);

        // $contador = count($resultado);

        // if($contador > 0){
        //     header ('Location: ../../vista/usuario/crear_usuario.html');
        // }else{
        //     header ('Location: index.html?mensaje=error');
        // }
        return $resultado;

    }

    public function verificacion_radicado($id_sondeo,$id_usuario){

    

        $inicio = $GLOBALS['bd']->query("Select * FROM radicados where id_sondeo = $id_sondeo AND id_usuario = $id_usuario; ");
        $resultado = $inicio->fetchAll(PDO::FETCH_OBJ);

        $rel = count($resultado);

        if($rel > 0){

            $radicado = $GLOBALS['bd']->query("Select CONCAT(radicado,LPAD(ID,4,'0')) radicado FROM radicados where id_sondeo = $id_sondeo AND id_usuario = $id_usuario; ");
            $peticion = $radicado->fetchALL(PDO::FETCH_OBJ);

            foreach($peticion as $dato){

                $RADICADO = $dato->radicado;
                
                return $RADICADO;

            }

            

        }else{

                
                $this->crear_radicado($id_sondeo,$id_usuario);



        }

        
        



    }




    public function crear_radicado($id_sondeo,$id_usuario){

        $inicio = $GLOBALS['bd']->prepare("INSERT INTO radicados (id_sondeo, id_usuario) VALUES (?,?); ");
        $resultado = $inicio->execute([$id_sondeo,$id_usuario]);

        if($resultado == 1){
            return 1;
        }

    }


    public function agregar_participación($id_sondeo,$id_usuario,$fecha){

        $proceso = $GLOBALS['bd']->prepare("INSERT INTO participación_sondeo (ID_SONDEO, ID_USUARIO, Fecha_Participación) VALUES (?,?,?)");
        $resultado = $proceso->execute([$id_sondeo,$id_usuario,$fecha]);

    }

}


?>
