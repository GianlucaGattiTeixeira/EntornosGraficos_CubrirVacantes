<?php
session_start();
if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
    header("Location: ../Logic/index.php");
    exit();
} // si no esta logeado o si esta logeado y es usuario comun: sale
include_once("../Logic/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <?php

    $cod_catedra = $_POST['cod_catedra'];
    $fecha_desde = $_POST['fecha_desde'];
    $fecha_hasta = $_POST['fecha_hasta'];
    $info_general = $_POST['info_general'];

    if (($cod_catedra == "") || ($fecha_desde == "") || ($fecha_hasta == "") || ($info_general == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    $conn = include("conexion.php");
    $sentencia = "SELECT MAX(cod_vacante) as cod_vacante FROM vacante";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    mysqli_free_result($resultado);

    if (isset($fila['cod_vacante'])) {
        $cod_vacante = $fila['cod_vacante'];
        $cod_vacante = $cod_vacante + 1;
    } else {
        $cod_vacante = 1;
    }
    try{
        //ingresar la vacante a la bd
        $sentencia = "INSERT INTO vacante (cod_vacante,fecha_desde,fecha_hasta,info_general,cod_catedra) VALUES ('$cod_vacante', '$fecha_desde', '$fecha_hasta', '$info_general', '$cod_catedra')";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=La vacante fue registrada -");</script>';
        }catch(Exception $e){
            echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
        }
        finally{
            mysqli_close($link);
        }
    ?>
</body>


</html>