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
        header('Location: error.php?mensaje=EXISTEN CAMPOS VACIOS -');
        exit();
    }

    //echo $legajo . ' - ' . $dni . ' - ' . $nombre . ' - ' . $apellido . ' - ' . $email;

    $conn = include("conexion.php");
    $sentencia =
        "UPDATE jefe_catedra
            SET nombre='$nombre', apellido='$apellido', email='$email'
            WHERE legajo='$legajo'";

    mysqli_query($link, $sentencia) or die(mysqli_error($link));


    $sentencia2 =
        "UPDATE usuario 
            SET nombre='$nombre', apellido='$apellido', email='$email'
            WHERE dni='$dni'";

    mysqli_query($link, $sentencia2) or die(mysqli_error($link));
    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h5>La jefe de cátedra fue modificado</h5>
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