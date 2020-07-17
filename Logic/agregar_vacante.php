<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>         	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
<?php
$conn = include("conexion.php");

//generar el cod_curriculum para identificar el cv en la carpeta Archivos
$sentencia = "SELECT MAX(cod_curriculum) as cod_curriculum FROM postulacion";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$fila = mysqli_fetch_array($resultado);
if (isset($fila['cod_curriculum'])){
    $cod_curriculum = $fila['cod_curriculum'];
    $cod_curriculum = $cod_curriculum +1;
} else {
    $cod_curriculum =1;
}

//asignar nombre y la ruta para almacenar el archivo (cv)
$nombre = $_FILES['archivo']['name'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "../Archivos/".$cod_curriculum.$nombre;

//almacena el cv en la carpeta Archivos
move_uploaded_file($ruta,$destino);

//recuperar el dni y el cod vacante para ingresar a la bd
session_start();
$dni= $_SESSION['dni'];
$cod_vacante= $_SESSION['cod_vacante'];


//registrar la postulacion a la bd
$sentencia2 = "INSERT INTO postulacion(dni,cod_vacante,fecha_hora,curriculum,cod_curriculum) VALUES ('$dni', '$cod_vacante', now(), '$nombre', '$cod_curriculum');";
$resultado2 = mysqli_query($link, $sentencia2) or die (mysqli_error($link));



?>
    <div class="container">
		<div class="form-group col-md-12">
			<br/>
			<h5>Su curriculum ha sido enviado</h5>
        </div>
                
        <div class="form-group">
			<div class="col-md-2">
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>            
			</div>
		</div>
    </div>





<?php


/*
mysqli_free_result($resultado);
mysqli_close($link);
*/
?>

</body>
</html>