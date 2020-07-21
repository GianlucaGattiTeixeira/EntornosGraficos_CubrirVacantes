<!DOCTYPE html>
<html>
    <head>
        <?php //include_once("../Logic/index.php"); ?>
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

    $sentencia2 = "SELECT * FROM usuario u INNER JOIN jefe_catedra jc ON u.dni = jc.dni INNER JOIN catedra c ON jc.legajo = c.legajo
                    WHERE u.usuario='$usuario' and u.contrasena='$contrasena'";
    $resultado2 = mysqli_query($link, $sentencia2) or die (mysqli_error($link));
    $existe2 = mysqli_fetch_assoc($resultado2);
    if ($existe2) {
        $_SESSION['nombre_catedra']=$existe2['nombre_catedra'];
    }

    header("Location: ../Logic/index.php");

} else {
    include_once("../Logic/header.php");
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
include_once("../Logic/footer.php");
?>
</body>
</html>