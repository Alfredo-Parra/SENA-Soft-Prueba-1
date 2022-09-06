<?php

include "conexión.php";

class usuario{

    public function agregar_usuario($tp,$nd,$nc,$a,$s,$tc,$tf,$ce,$m,$dir,$bv,$fn,$e,$cd,$er,$unv,$ade,$de,$ci){
        $proceso = $GLOBALS['bd']->prepare("INSERT INTO `usuario` (`Tipo_Documento`, `Número de Documento`, `Nombres Completos`, `Apellidos`, `Sexo`, `Teléfono_Celular`, `Teléfono_Fijo`, `Correo_Electrónico`, `Municipio`, `Dirección`, `Barrio-Vereda`, `Fecha_Nacimiento`, `Etnia`, `Condición_Discapacidad`, `Estrato_Residencia`, `U_Nivel_Educativo`, `Acceso_Dispositivos_E`, `Dispositivos_Tecnológicos`, `Conectividad_Internet`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $resultado = $proceso->execute([$tp,$nd,$nc,$a,$s,$tc,$tf,$ce,$m,$dir,$bv,$fn,$e,$cd,$er,$unv,$ade,$de,$ci]);

        if($resultado === TRUE){
            header("Location: ../vista/inicioU.html");
            exit();
        }else{
            header("Location: ../vista/resgistrar_usuario.html?mensaje=error");
            exit();
        }

    }
}


?>
