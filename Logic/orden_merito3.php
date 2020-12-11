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

    if (($dni == "") ||  ($cod_vacante == "") || ($puntaje == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    echo $dni . " - " . $cod_vacante . " - " . $puntaje;
    $conn = include("conexion.php");

    $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and cod_vacante = '$cod_vacante'  ";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $existe = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);

    if ($existe) {
        try{
            $sentencia = "UPDATE postulacion SET puntaje='$puntaje' WHERE dni='$dni' and cod_vacante = '$cod_vacante'";
            if (!mysqli_query($link, $sentencia)){
                throw new Exception();
            }
            //header("Location: ../Logic/orden_merito.php");
            echo '<script>window.location.replace("exito.php?mensaje=Puntaje registrado -");</script>';
        }catch(Exception $e){
            echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
        }
        finally{
            mysqli_close($link);
        }
    } else {
        include_once("../Logic/header.php");
        echo '<script>window.location.replace("error.php?mensaje=No existe la postulación -");</script>';
    }
    mysqli_close($link);
    ?>
</body>

</html>