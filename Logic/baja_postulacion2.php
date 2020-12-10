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
            header('Location: error.php?mensaje=NO SE SELECCIONÓ NINGUNA VACANTE -');
            exit();
        }

        $dni = substr($seleccion, 0, 8);
        $fecha_hora = substr($seleccion, 8, 27);
        $cod_vacante = substr($seleccion, 27);


        $dni = (int) $dni;
        $fecha_hora = substr($fecha_hora, 0, -1);
        $cod_vacante = (int) $cod_vacante;

        /*
echo ($seleccion);
echo ($dni);echo "<br>";
echo ($fecha_hora);echo "<br>";
echo ($cod_vacante);echo "<br>";echo "<br>";

echo (var_dump($dni));echo "<br>";
echo (var_dump($cod_vacante));echo "<br>";

echo ($fecha_hora);echo "<br>";
*/

        $conn = include("conexion.php");

        $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and fecha_hora='$fecha_hora' and cod_vacante='$cod_vacante'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);

        if ($existe) {

            $a = "../Archivos/";
            $b = $existe['cod_curriculum'];
            $c = $existe['curriculum'];
            $direccion = $a . $b . $c;
            unlink($direccion);
            $sentencia = "DELETE FROM postulacion WHERE dni='$dni' and fecha_hora='$fecha_hora' and cod_vacante='$cod_vacante'";

            mysqli_query($link, $sentencia) or die(mysqli_error($link));

        ?>
            <div class="container">
                <div class="form-group col-md-12">
                    <br />
                    <h5>La postulacion fue eliminada</h5>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </div>
        <?php


        } else {
        ?>
            <div class="container">
                <div class="form-group col-md-12">
                    <br />
                    <h5>La postulacion ingresada no existe</h5>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </div>
        <?php

        }
        mysqli_close($link);
        include_once("../Logic/footer.php");

        ?>
</body>