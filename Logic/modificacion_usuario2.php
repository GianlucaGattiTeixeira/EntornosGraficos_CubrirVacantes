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
    $conn = include("conexion.php");

    $dni = $_POST['seleccion'];

    $sentencia = "SELECT * FROM usuario WHERE dni = '$dni'";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    mysqli_free_result($resultado);

    ?>

    <div class="container">
        <br />
        <h3 align="center">Modificar usuario</h3>
        <form action="modificacion_usuario3.php" method="post">
            <div class="form-group col-md-12">
                <h5>Datos actuales</h5>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">DNI:</label>
                <div class="col-md-12">
                    <input name="dni_dis" class="form-control" type="number" value="<?php echo $fila['dni'] ?>" disabled>
                    <input name="dni" class="form-control" type="hidden" value="<?php echo $fila['dni'] ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Nombre:</label>
                    <div class="col-md-12">
                        <input name="nombre_dis" class="form-control" type="text" value="<?php echo $fila['nombre'] ?>" disabled>
                        <input name="nombre" class="form-control" type="hidden" value="<?php echo $fila['nombre'] ?>">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Apellido:</label>
                    <div class="col-md-12">
                        <input name="apellido_dis" class="form-control" type="text" value="<?php echo $fila['apellido'] ?>" disabled>
                        <input name="apellido" class="form-control" type="hidden" value="<?php echo $fila['apellido'] ?>">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Usuario:</label>
                    <div class="col-md-12">
                        <input name="usuario" id="inputUsuario" class="form-control" type="text" value="<?php echo $fila['usuario'] ?>">
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Contraseña:</label>
                    <div class="col-md-12">
                        <input name="contrasena" id="inputContrasena" class="form-control" type="text" value="<?php echo $fila['contrasena'] ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" onclick="return validacion_registro();">Ingresar</button>
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </form>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>


</html>