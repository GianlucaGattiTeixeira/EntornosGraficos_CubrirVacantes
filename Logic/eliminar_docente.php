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
    if(isset($_POST['legajo'])){
        $legajo = $_POST['legajo'];

        if (($legajo == "")){
            echo '<script>window.location.replace("exito.php?mensaje=No se ha indicado el docente a eliminar -");</script>';
        }
        try{
            $conn = include("conexion.php");
            // validar que no tenga catedras
            $tiene_catedras_query = "SELECT * FROM catedra WHERE legajo = $legajo";
            $tiene_catedras = mysqli_query($sentencia, $tiene_catedras_query);
            if($tiene_catedras){
                echo ('<script>window.location.replace("error.php?mensaje=No se pudo eliminar docente ya que tiene cátedras asignadas.");</script>');
            }
            else{
                $sentencia ="DELETE FROM jefe_catedra WHERE legajo = $legajo";
                $success = mysqli_query($link, $sentencia);
                if (!$success){
                    throw new Exception();
                }
                // $sentencia2 = "DELETE FROM usuario SWHERE dni='$dni'";
                // if (!mysqli_query($link, $sentenci2)){
                //     throw new Exception();
                // }
                echo('<script>window.location.replace("exito.php?mensaje=El docente ha sido ELIMINADO correctamente -");</script>');
            }
        }
        catch(Exception $e){
            echo ('<script>window.location.replace("error.php?mensaje=Error interno del servidor");</script>');
        }
        finally{
            mysqli_close($link);
        }
    }else{
        echo('<script>window.location.replace("exito.php?mensaje=No se ha indicado el docente a eliminar -");</script>');
    }
    
    ?>
</body>