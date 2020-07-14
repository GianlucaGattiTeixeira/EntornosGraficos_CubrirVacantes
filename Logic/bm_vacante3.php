<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

<body>
<?php
session_start();

$cod_vacante = $_SESSION['cod_vacante'];
$cod_catedra = $_POST['cod_catedra'];
$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$info_general = $_POST['info_general'];
$cant_puestos = $_POST['cant_puestos'];


$conn = include("conexion.php");

$sentencia = 
            "UPDATE vacante
            SET cod_catedra='$cod_catedra', fecha_desde='$fecha_desde', fecha_hasta='$fecha_hasta', info_general='$info_general', cant_puestos='$cant_puestos'
            WHERE cod_vacante='$cod_vacante'";

mysqli_query($link, $sentencia) or die (mysqli_error($link));


?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>La vacante fue modificada</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>
<?php

mysqli_close($link);
?>
</body>