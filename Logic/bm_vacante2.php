<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>         	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
<?php

session_start();

$seleccion = $_POST['seleccion'];

$indice=substr($seleccion, 0,1);
$cod_vacante=substr($seleccion, 1);
//echo ($indice.' - '.$cod_vacante);

$cod_vacante = (int) $cod_vacante;
//echo (' - '.var_dump($cod_vacante));



$conn = include("conexion.php");

if ($indice=='b'){

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
//se hace la modificacion



$sentencia = "SELECT * FROM vacante WHERE cod_vacante='$cod_vacante'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$fila = mysqli_fetch_array($resultado);


 $_SESSION['cod_vacante']=$fila['cod_vacante'];

?>
        <div class="container">
            <br/>
            <h3 align="center">Modificar vacante</h3>
            <form action="bm_vacante3.php" method="post">
                <div class="form-group col-md-12">
                    <h5>Datos actuales</h5>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4">Codigo vacante:</label>
                    <div class="col-md-12">
                    <input name="cod_vacante" class="form-control" type="number" value="<?php echo $fila['cod_vacante'] ?>" disabled>
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="control-label col-md-2">Catedra:</label>
                    <div class="col-md-12">
                    <input name="cod_catedra" class="form-control" type="number" value="<?php echo $fila['cod_catedra'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2">Fecha desde:</label>
                    <div class="col-md-12">
                    <input name="fecha_desde" class="form-control" type="datetime" value="<?php echo $fila['fecha_desde'] ?>">
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="control-label col-md-2">Fecha hasta:</label>
                    <div class="col-md-12">
                    <input name="fecha_hasta" class="form-control" type="datetime" value="<?php echo $fila['fecha_hasta'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2">Informacion:</label>
                    <div class="col-md-12">
                    <input name="info_general" class="form-control" type="text" value="<?php echo $fila['info_general'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Cantidad de puestos:</label>
                    <div class="col-md-12">
                    <input name="cant_puestos" class="form-control" type="number" value="<?php echo $fila['cant_puestos'] ?>">
                    </div>
                </div>
            
				<div class="form-group">
					<div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Ingresar</button> 
                        <a href="../Views/index.html" class="btn btn-primary">Menu principal</a>           
					</div>
                </div>
            </form>
        </div>
        
<?php
}


mysqli_close($link);

?>

</body>
</html>