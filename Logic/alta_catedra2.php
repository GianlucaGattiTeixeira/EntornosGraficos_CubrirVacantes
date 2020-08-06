<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
        header("Location: ../Logic/index.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php

    $nombre_catedra = $_POST['nombre_catedra'];
    $legajo = $_POST['legajo'];
    $cod_departamento = $_POST['cod_departamento'];

    //echo $nombre_catedra . " - " . $legajo . " - " . $cod_departamento;

    $conn = include("conexion.php");
    $sentencia1 = "SELECT cod_catedra FROM catedra WHERE nombre_catedra = '$nombre_catedra'";
    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));
    $existe1 = mysqli_fetch_assoc($resultado1);

    if ($existe1) {
    ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h5>El nombre de catedra ingresado ya existe, por favor ingrese otra catedra</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>
    <?php

    } else {
        $sentencia = "INSERT INTO catedra (nombre_catedra, legajo, cod_departamento) 
                        VALUES ('$nombre_catedra','$legajo','$cod_departamento')";
        mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h5>La catedra fue registrada</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>

    <?php
    }
    include_once("../Logic/footer.php");
    ?>
</body>

</html>