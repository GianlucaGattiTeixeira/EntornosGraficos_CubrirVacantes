<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php
    session_start();
    if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
        header("Location: ../Logic/index.php");
    } // si no esta logeado o si esta logeado y es usuario comun: sale
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Modificar o eliminar vacante</h3>
        </div>

        <?php
        $conn = include("conexion.php");

        $sentencia = "SELECT v.cod_vacante, v.fecha_desde, v.fecha_hasta, v.info_general, c.nombre_catedra
                FROM vacante v
                INNER JOIN catedra c
                ON v.cod_catedra=c.cod_catedra
                WHERE NOW() > fecha_desde and NOW() < fecha_hasta";

        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));


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
                            <th scope="col"></th>
                            <th scope="col"></th>
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
                                <td><button type="submit" class="btn btn-outline-info" style="color: blue;" name="seleccion" value="<?php echo 'm' . $fila['cod_vacante']; ?>"><img src="../Imagenes/Modificar.svg"/> Modificar</button></td>
                                <td><button type="submit" class="btn btn-outline-danger" style="color: red;" name="seleccion" value="<?php echo 'b' . $fila['cod_vacante']; ?>"><img src="../Imagenes/Borrar.svg"/> Eliminar</button></td>

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
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>