<!DOCTYPE html>
<html>
    <head>
        <?php
        include("../Logic/index.php"); 
        ?>
    </head>
    <body>
<?php
//session_start();

$cod_catedra = $_POST['cod_catedra'];
$cant_puestos = $_POST['cant_puestos'];
$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$info_general = $_POST['info_general'];

$conn = include("conexion.php");

//generar el codigo de la vacante. porque no le pusimos autoincremental gg
$sentencia = "SELECT MAX(cod_vacante) as cod_vacante FROM vacante";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
$fila = mysqli_fetch_array($resultado);

if (isset($fila['cod_vacante'])){
    $cod_vacante=$fila['cod_vacante'];
    $cod_vacante = $cod_vacante + 1;
} else {
    $cod_vacante =1;
}

//ingresar la vacante a la bd
$sentencia = "INSERT INTO vacante (cod_vacante,cant_puestos,fecha_desde,fecha_hasta,info_general,cod_catedra) 
            VALUES ('$cod_vacante', '$cant_puestos', '$fecha_desde', '$fecha_hasta', '$info_general', '$cod_catedra')";

mysqli_query($link, $sentencia) or die (mysqli_error($link));

?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>La vacante fue registrada</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>

<?php
mysqli_free_result($resultado);
mysqli_close($link);
?>
</body>
     
    
</html>