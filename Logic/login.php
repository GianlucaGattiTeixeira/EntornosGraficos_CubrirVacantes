<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
 	<body>
<?php
session_start();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$conn = include("conexion.php");

$sentencia = "SELECT dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,es_admin 
			FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$existe = mysqli_fetch_assoc($resultado);

if ($existe) {
    $_SESSION['dni']=$existe['dni'];
    $_SESSION['usuario']=$existe['usuario'];
    $_SESSION['es_admin']=$existe['es_admin'];
?>
        <div class="container">
        <div class="form-group col-md-12">
            <br/>
            <h3>Datos:</h3>
			<p>El dni es: <?php echo $_SESSION['dni']; ?></p>
            <p>El usuario es: <?php echo $_SESSION['usuario']; ?></p>
            <p>Es admin? <?php echo $_SESSION['es_admin']; ?></p>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
            </div>
        </div>
    </div>

<?php
} else {
?>

<div class="container">
        <div class="form-group col-md-12">
            <br/>
            <h3>Error:</h3>
            <p>El usuario ingresado no existe</p>
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