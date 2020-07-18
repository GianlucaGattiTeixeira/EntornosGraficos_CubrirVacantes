<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
    <link rel="stylesheet" href="../Logic/Estilo/estilo.css">
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
=======
        <?php
            session_start();
            if (! isset($_SESSION['dni']) ){header("Location: ../Logic/iniciar_sesion.php");}
            include("../Logic/index.php"); 
        ?>
>>>>>>> b560ba56884cb9cf7c9451238039ec88808b0051
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