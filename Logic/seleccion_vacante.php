<?php
session_start();
if (!isset($_SESSION['dni'])) {
    header("Location: ../Logic/iniciar_sesion.php");
    exit();
}
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
        $dni = $_SESSION['dni'];
        $cod_vacante = $_POST['seleccion'];

        $conn = include("conexion.php");

        $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and cod_vacante='$cod_vacante'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);

        if ($existe) {
            echo '<script>window.location.replace("error.php?mensaje=Ya te has postulado a la vacante seleccionada -");</script>';
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
                        <button type="submit" class="btn btn-primary">Postularse</button>
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