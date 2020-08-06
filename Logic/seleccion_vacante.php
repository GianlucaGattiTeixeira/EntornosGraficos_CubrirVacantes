<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['dni'])) {
        header("Location: ../Logic/iniciar_sesion.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <div class="container">
        <?php
        $dni = $_SESSION['dni'];
        $cod_vacante = $_POST['seleccion'];

        $conn = include("conexion.php");

        $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and cod_vacante='$cod_vacante'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);

        if ($existe) {
        ?>
            <div class="container">
                <div class="form-group col-md-12">
                    <br />
                    <h5>Ya te has postulado a la vacante seleccionada</h5>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </div>

        <?php
        } else {
            $_SESSION['cod_vacante'] = $cod_vacante;
        ?>
            <form action="agregar_vacante.php" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <br />
                    <h3>Enviar postulacion</h3>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">Curriculum:</label>
                    <div class="col-md-10">
                        <input name="archivo" class="form-control" type="file" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </div>
            </form>
    </div>
<?php
        }
        mysqli_free_result($resultado);
        mysqli_close($link);
        include_once("../Logic/footer.php");
?>

</body>

</html>