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
        header('Location: error.php?mensaje=EXISTEN CAMPOS VACIOS -');
        exit();
    }


    //echo $dni . ' - ' . $nombre . ' - ' . $apellido . ' - ' . $usuario. ' - ' . $contrasena;

    $conn = include("conexion.php");
    $sentencia =
        "UPDATE usuario
            SET usuario='$usuario', contrasena='$contrasena'
            WHERE dni='$dni'";

    mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h5>El usuario fue modificado</h5>
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