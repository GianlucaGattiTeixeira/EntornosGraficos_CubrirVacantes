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
    <div class="container">
        <?php
        $seleccion = $_POST['seleccion'];

        if ($seleccion == "") {
            echo '<script>window.location.replace("error.php?mensaje=Ninguna vacante fue seleccionada -");</script>';
        }

        $indice = substr($seleccion, 0, 1);
        $cod_vacante = substr($seleccion, 1);
        $cod_vacante = (int) $cod_vacante;
        $conn = include("conexion.php");

        if ($indice == 'b') {
            $sentencia = "DELETE FROM vacante WHERE cod_vacante = '$cod_vacante'";
            mysqli_query($link, $sentencia) or die(mysqli_error($link));
            echo '<script>window.location.replace("exito.php?mensaje=La vacante fue eliminada correctamente -");</script>';
        } else {
            //se hace la modificacion
            $sentencia = "SELECT * FROM vacante WHERE cod_vacante='$cod_vacante'";
            $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
            $fila = mysqli_fetch_array($resultado);
            mysqli_free_result($resultado);
        ?>
            <div class="container">
                <br />
                <h3 align="center">Modificar vacante</h3>
                <form action="bm_vacante3.php" method="post">
                    <div class="form-group col-md-12">
                        <h5>Datos actuales</h5>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-12">Codigo vacante:</label>
                            <div class="col-md-12">
                                <input name="cod_vacante_dis" class="form-control" type="number" value="<?php echo $fila['cod_vacante'] ?>" disabled>
                                <input name="cod_vacante" class="form-control" type="hidden" value="<?php echo $fila['cod_vacante'] ?>">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-12">Catedra:</label>
                            <div class="col-md-12">
                                <input name="cod_catedra" class="form-control" type="number" value="<?php echo $fila['cod_catedra'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label col-md-12">Fecha desde:</label>
                            <div class="col-md-12">
                                <input name="fecha_desde" class="form-control" type="datetime" value="<?php echo $fila['fecha_desde'] ?>">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label col-md-12">Fecha hasta:</label>
                            <div class="col-md-12">
                                <input name="fecha_hasta" class="form-control" type="datetime" value="<?php echo $fila['fecha_hasta'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Informacion:</label>
                        <div class="col-md-12">
                            <input name="info_general" class="form-control" type="text" value="<?php echo $fila['info_general'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>

        <?php
        }


        mysqli_close($link);
        include_once("../Logic/footer.php");

        ?>

</body>

</html>