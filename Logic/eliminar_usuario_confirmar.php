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
    $dni = $_POST['dniUsuarioEliminar'];
    if ($dni == ""){
        echo '<script>window.location.replace("error.php?mensaje=No se seleccionó ningpun usuario -");</script>';
    }
    $sentencia = "SELECT * FROM usuario WHERE dni = '$dni'";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $sentencia_es_docente = "SELECT * FROM jefe_catedra WHERE dni = '$dni'";
    $es_docente_resultado = mysqli_query($link, $sentencia_es_docente);
    $es_docente = mysqli_fetch_array($es_docente_resultado);
    $fila = mysqli_fetch_array($resultado);
    ?>
    <div class="container">
        <br />
        <h3 align="center">Eliminar usuario</h3>
        <div class="form-group col-md-12">
            <h5>Datos actuales</h5>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="control-label col-md-12">DNI:</label>
                <div class="col-md-12">
                    <input name="dni_dis" class="form-control" type="number" value="<?php echo $fila['dni'] ?>" disabled>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label col-md-12">Usuario:</label>
                <div class="form-group col-md-12">
                    <input name="usuario" id="inputUsuario" class="form-control" type="text" value="<?php echo $fila['usuario'] ?>" disabled>
                </div>
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
            
        </div>
        <?php
        if($es_docente){?>
            <div class="form-group">
                <div class="col-md-8">
                    <button class="btn btn-danger" disabled data-toggle="tooltip" data-placement="top" title="No se pudede eliminar, el usuario es docente, primero eliminelo de el menu docentes">Eliminar</button>
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        <?php
        }else{
        ?>
            <form action="eliminar_usuario.php" method="post">
                <input name="dni" class="form-control" type="hidden" value="<?php echo $fila['dni'] ?>">
                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </form>
        <?php }?>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>


</html>