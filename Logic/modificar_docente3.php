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
    $legajo = $_SESSION['legajo_modificar'];
    $dni = $_SESSION['dni_modificar'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    if (($dni == "") ||  ($nombre == "") ||($apellido == "") ||($legajo == "") ||($email == "")){
        echo '<script>window.location.replace("exito.php?mensaje=Existen campos vacíos -");</script>';
    }
    try{
        $conn = include("conexion.php");
        $sentencia ="UPDATE jefe_catedra SET nombre='$nombre', apellido='$apellido', email='$email' WHERE legajo='$legajo'";
        if (!mysqli_query($link, $sentencia)){
            throw new Exception();
        }
        $sentencia2 = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email' WHERE dni='$dni'";
        if (!mysqli_query($link, $sentenci2)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=El docente ha sido modificado correctamente -");</script>';
    }
    catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }
    finally{
        mysqli_close($link);
    }
    ?>
</body>