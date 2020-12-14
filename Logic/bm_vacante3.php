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
    $cod_vacante = $_POST['cod_vacante'];
    $cod_catedra = $_POST['cod_catedra'];
    $fecha_desde = $_POST['fecha_desde'];
    $fecha_hasta = $_POST['fecha_hasta'];
    $info_general = $_POST['info_general'];

    if (($cod_catedra == "") || ($fecha_desde == "") || ($fecha_hasta == "") || ($info_general == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    $conn = include("conexion.php");
    $sentencia = "UPDATE vacante SET cod_catedra='$cod_catedra', fecha_desde='$fecha_desde', fecha_hasta='$fecha_hasta', info_general='$info_general' WHERE cod_vacante='$cod_vacante'";
    try {
        if (!mysqli_query($link, $sentencia)) {
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=La vacante fue modificada correctamente -");</script>';
    } catch (Exception $e) {
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    } finally {
        mysqli_close($link);
    }
    include_once("../Logic/footer.php");
    ?>
</body>