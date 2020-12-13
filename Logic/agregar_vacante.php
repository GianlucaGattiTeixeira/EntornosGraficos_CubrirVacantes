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
    <?php
    $dni = $_SESSION['dni'];
    $cod_vacante = $_SESSION['cod_vacante'];

    $conn = include("conexion.php");


    //generar el cod_curriculum para identificar el cv en la carpeta Archivos
    $sentencia = "SELECT MAX(cod_curriculum) as cod_curriculum FROM postulacion";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    if (isset($fila['cod_curriculum'])) {
        $cod_curriculum = $fila['cod_curriculum'];
        $cod_curriculum = $cod_curriculum + 1;
    } else {
        $cod_curriculum = 1;
    }

    //asignar nombre y la ruta para almacenar el archivo (cv)
    $nombre = $_FILES['archivo']['name'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../Archivos/" . $cod_curriculum . $nombre;

    //almacena el cv en la carpeta Archivos
    move_uploaded_file($ruta, $destino);


    //registrar la postulacion a la bd
    try{
        $sentencia2 = "INSERT INTO postulacion(dni,cod_vacante,fecha_hora,curriculum,cod_curriculum) VALUES ('$dni', '$cod_vacante', now(), '$nombre', '$cod_curriculum');";
        if(!mysqli_query($link, $sentencia2)){
            throw new Exception();
        }
        echo '<script>window.location.replace("exito.php?mensaje=Su curriculum ha sido enviado -");</script>';
    }catch(Exception $e){
        echo '<script>window.location.replace("error.php?mensaje=Error interno del servidor -");</script>';
    }finally{
        mysqli_close($link);
    }
    include_once("../Logic/footer.php");
    ?>

</body>

</html>