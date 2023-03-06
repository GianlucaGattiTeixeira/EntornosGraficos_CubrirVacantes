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

    $dni = $_POST['dni'];

    if ($dni == ""){
        echo '<script>window.location.replace("error.php?mensaje=No se ha recibido el usuario a eliminar. -");</script>';
    }

    try{
        $conn = include("conexion.php");
        $sentencia = "DELETE FROM usuario WHERE dni='$dni'";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=El usuario ha sido ELIMINADO correctamente -");</script>';
    }
    catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }
    finally{
        mysqli_close($link);
    }
    ?>
</body>