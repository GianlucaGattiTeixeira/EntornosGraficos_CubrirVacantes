<?php
session_start();
if (!isset($_SESSION['dni'])) {
    header("Location: ../Logic/iniciar_sesion.php");
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

    $dni = $_SESSION['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];

    if (($dni == "") || ($nombre == "") || ($apellido == "") || ($usuario == "") || ($contrasena == "") || ($email == "") || ($direccion == "") || ($ciudad == "") || ($provincia == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }
    try{
        $conn = include("conexion.php");
        $sentencia = "UPDATE usuario SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', usuario='$usuario', contrasena='$contrasena', direccion='$direccion', ciudad='$ciudad', provincia='$provincia' WHERE dni='$dni'";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=Datos modificados correctamente -");</script>';
    }catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }
    finally{
        mysqli_close($link);
    }
    ?>
</body>

</html>