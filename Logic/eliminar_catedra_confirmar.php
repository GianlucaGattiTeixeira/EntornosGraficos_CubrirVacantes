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

    $cod_catedra = $_POST['seleccion'];

    if ($cod_catedra == ""){
        echo '<script>window.location.replace("error.php?mensaje=No se seleccionó ninguna cátedra -");</script>';
    }

    $sentencia = "SELECT c.cod_catedra, c.nombre_catedra, jc.legajo, jc.nombre, jc.apellido, d.cod_departamento, d.nombre as nombre_departamento
                    FROM catedra c       
                    INNER JOIN jefe_catedra jc
                    ON c.legajo = jc.legajo                       
                    INNER JOIN departamento d
                    ON c.cod_departamento = d.cod_departamento
                    WHERE  c.cod_catedra = '$cod_catedra'";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    mysqli_free_result($resultado);
    $_SESSION['cod_catedra'] = $fila['cod_catedra'];

    $legajo = $fila['legajo'];
    $cod_departamento = $fila['cod_departamento'];

    $sentencia2 = "SELECT legajo, nombre, apellido FROM jefe_catedra WHERE legajo != '$legajo'";
    $resultado2 = mysqli_query($link, $sentencia2) or die(mysqli_error($link));

    $sentencia3 = "SELECT cod_departamento, nombre FROM departamento WHERE cod_departamento != '$cod_departamento'";
    $resultado3 = mysqli_query($link, $sentencia3) or die(mysqli_error($link));


    ?>

    <div class="container">
        <br />
        <h3 align="center">Modificar cátedra</h3>
            <div class="form-group col-md-12">
                <h5>Datos actuales</h5>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-4">Codigo cátedra:</label>
                    <div class="col-md-12">
                        <input name="cod_catedra" class="form-control" type="number" value="<?php echo $fila['cod_catedra'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-2">Catedra:</label>
                    <div class="col-md-12">
                        <input name="nombre_catedra" class="form-control" type="text" value="<?php echo $fila['nombre_catedra'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Departamento:</label>
                    <div class="col-md-12">
                        <input name="cod_departamento" class="form-control" type="text" value="<?php echo $fila['nombre_departamento'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Jefe de cátedra:</label>
                    <div class="col-md-12">
                        <input name="legajo" class="form-control" type="text" value="<?php echo $fila['nombre'] ?>" disabled>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Legajo:</label>
                    <div class="col-md-12">
                        <input name="cod_departamento" class="form-control" type="text" value="<?php echo $fila['legajo'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <form action="eliminar_catedra.php" method="post">
                        <input type="hidden" value=" <?php echo $fila['cod_catedra'] ?> " name="cod_catedra">
                        <button type="submit" class="btn btn-danger"> <img src="../Imagenes/BorrarBlanco.svg" /> Eliminar</button>
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </form>
                </div>
            </div>
        </form>
    </div>

    <?php
    
    include_once("../Logic/footer.php");

    ?>

</body>

</html>