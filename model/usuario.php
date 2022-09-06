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

            print("cuenta admin");

        }else{

            $inicio = $GLOBALS['bd']->query("Select * FROM inicio_sesión where Número_Documento = $user AND Contraseña = $con");
            $resultado = $inicio->fetchAll(PDO::FETCH_OBJ);

            $contador = count($resultado);
    
          if($contador == 1){
              header ('Location: ../../vista/usuario/crear_usuario.html');
           }else{
                header ('Location: login.php?mensaje=error');
           }
        }

    }

    public function crear_usuario($documento,$contraseña){

        $registro = $GLOBALS['bd']->prepare("INSERT INTO inicio_sesión (Número_Documento,Contraseña) VALUES (?,?);");
        $resultado = $registro->execute([$documento,$contraseña]);

      if($resultado === TRUE){
          header ('Location: ../login.php');
       }
    }

   
}


?>