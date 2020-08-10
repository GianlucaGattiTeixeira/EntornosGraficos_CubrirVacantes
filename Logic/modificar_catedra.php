<!DOCTYPE html>
<html>

<head>
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
            <h3>Modificar o eliminar cátedra</h3>
        </div>

        <?php
        $conn = include("conexion.php");

        $sentencia = "SELECT c.cod_catedra, c.nombre_catedra, jc.legajo, jc.nombre, jc.apellido, d.cod_departamento, d.nombre as nombre_departamento
                        FROM catedra c       
                        INNER JOIN jefe_catedra jc
                        ON c.legajo = jc.legajo                       
                        INNER JOIN departamento d
                        ON c.cod_departamento = d.cod_departamento";

        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

        ?>
        <div class="container">
            <form action="modificar_catedra2.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Cátedra</th>
                            <th scope="col">Jefe de cátedra</th>
                            <th scope="col">Departamento</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td><?php echo ($fila['cod_catedra']); ?></td>
                                <td><?php echo ($fila['nombre_catedra']); ?></td>
                                <td><?php echo ($fila['nombre']) . ' ' . ($fila['apellido']); ?></td>
                                <td><?php echo ($fila['nombre_departamento']); ?></td>
                                <td><button type="submit" class="btn btn-primary" style="background-color: #ADD8E6 !important;" name="seleccion" value="<?php echo $fila['cod_catedra']; ?>">Modificar</button></td>
                            </tr>

                        <?php
                        }
                        mysqli_free_result($resultado);
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

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>