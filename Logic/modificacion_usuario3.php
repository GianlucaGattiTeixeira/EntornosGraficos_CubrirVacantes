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
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (($dni == "") ||  ($nombre == "") ||($apellido == "") ||($usuario == "") ||($contrasena == "")){
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    try{
        $conn = include("conexion.php");
        $sentencia = "UPDATE usuario SET usuario='$usuario', contrasena='$contrasena' WHERE dni='$dni'";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=El usuario ha sido modificado correctamente -");</script>';
    }
    catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }
    finally{
        mysqli_close($link);
    }
    ?>
</body>