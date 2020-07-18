<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../Logic/Estilo/estilo.css">
        <?php //include("../Logic/index.php"); ?>
    </head>
    
 	<body>
<?php

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$conn = include("conexion.php");

$sentencia = "SELECT dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,es_admin 
			FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$existe = mysqli_fetch_assoc($resultado);

if ($existe) {
    session_start();
    $_SESSION['dni']=$existe['dni'];
    $_SESSION['usuario']=$existe['usuario'];
    $_SESSION['es_admin']=$existe['es_admin'];
    header("Location: ../Logic/index.php");

} else {
    include("../Logic/index.php");
?>

<div class="container">
        <div class="form-group col-md-12">
            <br/>
            <h3>Error:</h3>
            <p>El usuario ingresado no existe</p>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <a href="../Logic/iniciar_sesion.php" class="btn btn-primary">Iniciar sesion</a> 
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>           
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