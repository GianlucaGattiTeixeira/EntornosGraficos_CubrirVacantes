<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <?php
//session_start();

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];

$conn = include("conexion.php");


$sentencia = "SELECT dni FROM usuario WHERE dni='$dni'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$existe = mysqli_fetch_assoc($resultado);

if ($existe) {
?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>El usuario ingresado ya existe</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>
<?php
} else {
    $sentencia = "INSERT INTO usuario (dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,es_admin) 
                    values ('$dni','$nombre','$apellido','$email','$usuario','$contrasena','$direccion','$ciudad','0')";

    mysqli_query($link, $sentencia) or die (mysqli_error($link));

    ?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>El usuario fue registrado</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>
<?php
}
mysqli_free_result($resultado);
mysqli_close($link);
?>
</body>
     
    
</html>