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

    $cod_catedra = $_SESSION['cod_catedra'];
    $nombre_catedra = $_POST['nombre_catedra'];
    $legajo = $_POST['legajo'];
    $cod_departamento = $_POST['cod_departamento'];

    //echo $cod_catedra . ' - ' . $nombre_catedra . ' - ' . $legajo . ' - ' .  $cod_departamento;


    $conn = include("conexion.php");

    $sentencia =
        "UPDATE catedra
            SET nombre_catedra='$nombre_catedra', legajo='$legajo', cod_departamento='$cod_departamento'
            WHERE cod_catedra='$cod_catedra'";

    mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h5>La cátedra fue modificada</h5>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
            </div>
        </div>
    </div>
    <?php
    include_once("../Logic/footer.php");
    ?>
</body>