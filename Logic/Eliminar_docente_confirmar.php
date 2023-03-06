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

    $legajo = $_POST['seleccion'];

    if($legajo == ""){
        echo '<script>window.location.replace("error.php?mensaje=No se seleccionó ningún docente -");</script>';
    }

    $sentencia = "SELECT * FROM jefe_catedra WHERE legajo = '$legajo'";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    ?>

    <div class="container">
        <br />
        <h3 align="center">Eliminar docente</h3>
            <div class="form-group col-md-12">
                <h5>Datos actuales</h5>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Legajo:</label>
                    <div class="col-md-12">
                        <input name="legajo" class="form-control" type="number" value="<?php echo $fila['legajo'] ?>" disabled>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">DNI:</label>
                    <div class="col-md-12">
                        <input name="dni" class="form-control" type="number" value="<?php echo $fila['dni'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Nombre:</label>
                    <div class="col-md-12">
                        <input name="nombre" class="form-control" type="text" value="<?php echo $fila['nombre'] ?>" disabled>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Apellido:</label>
                    <div class="col-md-12">
                        <input name="apellido" class="form-control" type="text" value="<?php echo $fila['apellido'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Email:</label>
                <div class="col-md-12">
                    <input name="email" class="form-control" type="email" value="<?php echo $fila['email'] ?> " disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <form action="eliminar_docente.php" method="post">
                        <input type ="hidden" value="<?php echo($legajo);?>" name="legajo">
                        <button type="submit" class="btn btn-danger" name="seleccion"><img src="../Imagenes/BorrarBlanco.svg" />Eliminar</button></td>
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </form>
                </div>
            </div>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>


</html>