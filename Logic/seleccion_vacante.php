<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
    <link rel="stylesheet" href="../Logic/Estilo/estilo.css">
        <title>UTN FRRO</title>         	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
=======
        <?php
            session_start();
            if (! isset($_SESSION['dni']) ){header("Location: ../Logic/iniciar_sesion.php");}
            include_once("../Logic/index.php"); 
        ?>
>>>>>>> b560ba56884cb9cf7c9451238039ec88808b0051
    </head>

    <body>
        <div class="container">
<?php

$cod_vacante = $_POST['seleccion'];


$conn = include("conexion.php");

$sentencia = "SELECT * FROM vacante WHERE cod_vacante='$cod_vacante'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$fila = mysqli_fetch_array($resultado);

$_SESSION['cod_vacante']=$fila['cod_vacante'];


?>
            <form action="agregar_vacante.php" method="post" enctype="multipart/form-data">
				<div class="form-group col-md-12">
					<br/>
					<h3>Enviar postulacion</h3>
                </div>
                
                <div class="form-group">
					<label class="control-label col-md-2">Curriculum:</label>
					<div class="col-md-10">
					<input name="archivo" class="form-control" type="file" placeholder="" >
					</div>
                </div>
                
                <div class="form-group">
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary">Ingresar</button>            
					</div>
				</div>
			
			</form>




        </div>





<?php


mysqli_free_result($resultado);
mysqli_close($link);

?>

</body>
</html>