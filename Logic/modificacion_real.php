<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

<body>
<?php
session_start();

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
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>
<?php

mysqli_close($link);
?>
</body>