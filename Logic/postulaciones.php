<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../Logic/Estilo/estilo.css">
        <?php
        include("../Logic/index.php"); 
        ?>
    </head>
    
<body>
    <div class="container">
<?php
$conn = include("conexion.php");

$sentencia = "SELECT * FROM postulacion ORDER BY fecha_hora ASC";

$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
//$total_registros = mysqli_num_rows($resultado);


?>
        <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h3>Postulaciones</h3>
            </div>
            <form action="seleccion_vacante.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Cod Vacante</th>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Nombre CV</th>
                        <th scope="col">Codigo CV</th>
                        <th scope="col">Curriculum</th>
                        </tr>
                    </thead>

                    <tbody>

<?php
while ($fila = mysqli_fetch_array($resultado))
{
?>
                        <tr>
                        <td><?php echo ($fila['dni']); ?></td>
                        <td><?php echo ($fila['cod_vacante']); ?></td>
                        <td><?php echo ($fila['fecha_hora']); ?></td>  
                        <td><?php echo ($fila['curriculum']); ?></td>
                        <td><?php echo ($fila['cod_curriculum']); ?></td>
                        <td><a href="../Archivos/<?php $a=$fila['cod_curriculum'];$b=$fila['curriculum'];echo $a.$b;?> " target="_blank"> Ver CV</a></td>
                        </tr>

<?php
}

// Liberar conjunto de resultados
mysqli_free_result($resultado);
// Cerrar la conexion
mysqli_close($link);
?>


                    </tbody>
                </table>
            </form>


            <div class="form-group">
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
            </div>
        </div>
    </div>
</body>