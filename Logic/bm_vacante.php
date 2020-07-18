<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            if (! isset($_SESSION['es_admin']) or ($_SESSION['es_admin']==0) ){header("Location: ../Logic/index.php");} // si no esta logeado o si esta logeado y es usuario comun: sale
            include("../Logic/index.php"); 
        ?>
    </head>
    
<body>
    <div class="container">
        <div class="form-group col-md-12">
			<br/>
			<h3>Modificar o eliminar vacante</h3>
		</div>
        
<?php
$conn = include("conexion.php");

$sentencia = "SELECT v.cod_vacante,v.cant_puestos, v.fecha_desde, v.fecha_hasta, v.info_general, c.nombre
                FROM vacante v
                INNER JOIN catedra c
                ON v.cod_catedra=c.cod_catedra
                WHERE NOW() < fecha_hasta";

$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));


?>
        <div class="container">
            <form action="bm_vacante2.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Cátedra</th>
                        <th scope="col">Fecha desde</th>
                        <th scope="col">Fecha hasta</th>
                        <th scope="col">Informacion</th>
                        <th scope="col">Cantidad de puestos</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

<?php
while ($fila = mysqli_fetch_array($resultado))
{
?>
                        <tr>
                        <td><?php echo ($fila['cod_vacante']); ?></td>
                        <td><?php echo ($fila['nombre']); ?></td>
                        <td><?php echo ($fila['fecha_desde']); ?></td>  
                        <td><?php echo ($fila['fecha_hasta']); ?></td>
                        <td><?php echo ($fila['info_general']); ?></td>
                        <td><?php echo ($fila['cant_puestos']); ?></td>
                        <td><button type="submit" class="btn btn-primary" name="seleccion" value="<?php echo 'm'.$fila['cod_vacante']; ?>">Modificar</button></td>
                        <td><button type="submit" class="btn btn-primary" name="seleccion" value="<?php echo 'b'.$fila['cod_vacante']; ?>">Eliminar</button></td>

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