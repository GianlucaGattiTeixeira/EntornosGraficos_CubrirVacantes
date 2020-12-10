<?php
session_start();
if (!isset($_SESSION['legajo']) or !isset($_SESSION['dni'])) {
    header("Location: ../Logic/index.php");
    exit();
}
//include_once("../Logic/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <?php
    $dni = $_POST['dni'];
    $cod_vacante = $_POST['cod_vacante'];
    $puntaje = $_POST['puntaje'];

    echo $dni . " - " . $cod_vacante . " - " . $puntaje;
    $conn = include("conexion.php");

    $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and cod_vacante = '$cod_vacante'  ";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $existe = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);

    if ($existe) {
        $sentencia = "UPDATE postulacion SET puntaje='$puntaje' WHERE dni='$dni' and cod_vacante = '$cod_vacante'";
        mysqli_query($link, $sentencia) or die(mysqli_error($link));
        header("Location: ../Logic/orden_merito.php");
    } else {
        include_once("../Logic/header.php");
    ?>

        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h3>Error:</h3>
                <p>La postulacion ingresada no existe</p>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/orden_merito.php" class="btn btn-primary">Orden de merito</a>
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>





    <?php
    
    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>