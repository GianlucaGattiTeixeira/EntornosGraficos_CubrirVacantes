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
    $cod_vacante = $_SESSION['cod_vacante'];
    $cod_catedra = $_POST['cod_catedra'];
    $fecha_desde = $_POST['fecha_desde'];
    $fecha_hasta = $_POST['fecha_hasta'];
    $info_general = $_POST['info_general'];

    if (($cod_catedra == "") || ($fecha_desde == "") || ($fecha_hasta == "") || ($info_general == "")) {
        header('Location: error.php?mensaje=EXISTEN CAMPOS VACÍOS -');
        exit();
    }


    $conn = include("conexion.php");

    $sentencia =
        "UPDATE vacante
            SET cod_catedra='$cod_catedra', fecha_desde='$fecha_desde', fecha_hasta='$fecha_hasta', info_general='$info_general'
            WHERE cod_vacante='$cod_vacante'";

    mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h5>La vacante fue modificada</h5>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
            </div>
        </div>
    </div>
    <?php

    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>