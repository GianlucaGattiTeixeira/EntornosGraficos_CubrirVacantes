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
    /*
echo $dni;
echo $nombre;
echo $apellido;
echo $email;
echo $usuario;
echo $contrasena;
echo $direccion;
echo $ciudad;
*/

    if (($dni == "") || ($nombre == "") || ($apellido == "") || ($usuario == "") || ($contrasena == "") || ($email == "") || ($direccion == "") || ($ciudad == "") || ($provincia == "")) {
        header('Location: error.php?mensaje=EXISTEN CAMPOS VACÍOS -');
        exit();
    }
    $conn = include("conexion.php");

    $sentencia =
        "UPDATE usuario
            SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', usuario='$usuario', contrasena='$contrasena', direccion='$direccion', ciudad='$ciudad', provincia='$provincia'
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

    mysqli_close($link);
    include_once("../Logic/footer.php");

    ?>
</body>

</html>