<?php
session_start();
// si no esta logeado o si esta logeado y es usuario comun: sale
if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
    header("Location: ../Logic/index.php");
    exit();
}
include_once("../Logic/header.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <div class="container">
        <?php

        $seleccion = $_POST['seleccion'];

        if ($seleccion == "") {
            echo '<script>window.location.replace("error.php?mensaje=No se seleccionó ninguna vacante -");</script>';
        }

        $dni = substr($seleccion, 0, 8);
        $fecha_hora = substr($seleccion, 8, 27);
        $cod_vacante = substr($seleccion, 27);
        $dni = (int) $dni;
        $fecha_hora = substr($fecha_hora, 0, -1);
        $cod_vacante = (int) $cod_vacante;
        
        $conn = include("conexion.php");
        $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and fecha_hora='$fecha_hora' and cod_vacante='$cod_vacante'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);

        if ($existe) {
            $a = "../Archivos/";
            $b = $existe['cod_curriculum'];
            $c = $existe['curriculum'];
            $direccion = $a . $b . $c;
            unlink($direccion);
            try{
                $sentencia = "DELETE FROM postulacion WHERE dni='$dni' and fecha_hora='$fecha_hora' and cod_vacante='$cod_vacante'";
                if (!mysqli_query($link, $sentencia)){
                    throw new Exception();
                }
                echo '<script>window.location.replace("exito.php?mensaje=La postulación fue eliminada -");</script>';
            }catch(Exception $e){
                echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
            }
            finally{
                mysqli_close($link);
            }
        } else {
            echo '<script>window.location.replace("error.php?mensaje=La postulación ingresada no existe -");</script>';
        }
        mysqli_close($link);
        ?>
</body>