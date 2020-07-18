<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            if (! isset($_SESSION['dni']) ){header("Location: ../Logic/iniciar_sesion.php");}
            include("../Logic/index.php"); 
        ?>
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
$conn = include("conexion.php");

$sentencia = 
            "UPDATE usuario
            SET dni='$dni', nombre='$nombre', apellido='$apellido', email='$email', usuario='$usuario', contrasena='$contrasena', direccion='$direccion', ciudad='$ciudad'
            WHERE dni='$dni'";

mysqli_query($link, $sentencia) or die (mysqli_error($link));


?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
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
?>
</body>