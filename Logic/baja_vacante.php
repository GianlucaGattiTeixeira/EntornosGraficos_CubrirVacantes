<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

<body>
<?php
//session_start();

$cod_vacante = $_POST['cod_vacante'];

$conn = include("conexion.php");

$sentencia = "SELECT * FROM vacante WHERE cod_vacante='$cod_vacante'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));;
$existe = mysqli_fetch_assoc($resultado);

if ($existe) {
    $sentencia = "DELETE FROM vacante WHERE cod_vacante = '$cod_vacante'";

    mysqli_query($link, $sentencia) or die (mysqli_error($link));

?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>La vacante fue eliminada</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>            
                </div>
            </div>
    </div>
<?php


} else {
?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>La vacante ingresada no existe</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>         
                </div>
            </div>
    </div>
<?php

}
mysqli_free_result($resultado);
mysqli_close($link);


?>
</body>