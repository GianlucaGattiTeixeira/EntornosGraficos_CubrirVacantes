<?php
session_start();
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
    <?php

    $nombre_catedra = $_POST['nombre_catedra'];
    $legajo = $_POST['legajo'];
    $cod_departamento = $_POST['cod_departamento'];

    if (($nombre_catedra == "") || ($legajo == "") || ($cod_departamento == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    //echo $nombre_catedra . " - " . $legajo . " - " . $cod_departamento;

    $conn = include("conexion.php");
    $sentencia1 = "SELECT cod_catedra FROM catedra WHERE nombre_catedra = '$nombre_catedra'";
    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));
    $existe1 = mysqli_fetch_assoc($resultado1);

    if ($existe1) {
        echo '<script>window.location.replace("error.php?mensaje=La cátedra ingresada ya existe -");</script>';
    }else {
        try{
            $sentencia = "INSERT INTO catedra (nombre_catedra, legajo, cod_departamento) VALUES ('$nombre_catedra','$legajo','$cod_departamento')";
            if (!mysqli_query($link, $sentencia)){
                throw new Exception();
            }
            echo '<script>window.location.replace("exito.php?mensaje=La cátedra se registró satisfactoriamente -");</script>';
        }
        catch(Exception $e){
            echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
        }
        finally{
            mysqli_close($link);
        }
    }
    ?>
</body>

</html>