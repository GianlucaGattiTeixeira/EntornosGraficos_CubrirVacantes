<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php
    $conn = include("conexion.php");

    $sentencia = "SELECT v.cod_vacante, v.fecha_desde, v.fecha_hasta, v.info_general, c.nombre_catedra
                FROM vacante v
                INNER JOIN catedra c
                ON v.cod_catedra=c.cod_catedra
                WHERE NOW() > fecha_desde and NOW() < fecha_hasta AND c.baja  = 0";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
   



    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Vacantes</h3>
        </div>
        <form action="seleccion_vacante.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Cátedra</th>
                        <th scope="col">Fecha desde</th>
                        <th scope="col">Fecha hasta</th>
                        <th scope="col">Informacion</th>
                        <?php
                        if (!isset($_SESSION['legajo'])) {
                            if (isset($_SESSION['es_admin']) and $_SESSION['es_admin'] == 0) {
                            echo '<th scope="col"></th>';
                            }
                        }
                        ?>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo ($fila['cod_vacante']); ?></td>
                            <td><?php echo ($fila['nombre_catedra']); ?></td>
                            <td><?php echo ($fila['fecha_desde']); ?></td>
                            <td><?php echo ($fila['fecha_hasta']); ?></td>
                            <td><?php echo ($fila['info_general']); ?></td>
                            <?php
                            if (!isset($_SESSION['legajo'])) {
                                if (isset($_SESSION['es_admin']) and $_SESSION['es_admin'] == 0) {
                                echo '<td><button type="submit" class="btn btn-primary" name="seleccion" value="' . $fila['cod_vacante'] . '">Postularse</button></td>';
                                }
                            }
                            ?>

                        </tr>

                    <?php
                    }
                    mysqli_free_result($resultado);
                    mysqli_close($link);
                    ?>


                </tbody>
            </table>
        </form>
    </div>
    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>