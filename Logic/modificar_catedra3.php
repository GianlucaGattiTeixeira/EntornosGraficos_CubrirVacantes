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

    if (($cod_catedra == "") || ($nombre_catedra == "") || ($legajo == "")||($cod_departamento == "") ){
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }
    try{
        $conn = include("conexion.php");
        $sentencia = "UPDATE catedra SET nombre_catedra='$nombre_catedra', legajo='$legajo', cod_departamento='$cod_departamento' WHERE cod_catedra='$cod_catedra'";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=La cátedra fue modificada correctamente -");</script>';
    }
    catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }
    finally{
        mysqli_close($link);
    }
    ?>
</body>