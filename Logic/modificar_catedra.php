<?php
session_start();
if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
    header("Location: ../Logic/index.php");
    exit();
} // si no esta logeado o si esta logeado y es usuario comun: sale
include_once("../Logic/header.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Modificar o eliminar cátedra</h3>
        </div>

        <?php
        $conn = include("conexion.php");

        $sentencia = "SELECT c.cod_catedra, c.nombre_catedra, jc.legajo, jc.nombre, jc.apellido, d.cod_departamento, c.baja, d.nombre as nombre_departamento
                        FROM catedra c       
                        LEFT JOIN jefe_catedra jc
                        ON c.legajo = jc.legajo                       
                        INNER JOIN departamento d
                        ON c.cod_departamento = d.cod_departamento
                        WHERE c.baja = 0";

        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        

        ?>
        <div class="container">
           
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Cátedra</th>
                            <th scope="col">Jefe de cátedra</th>
                            <th scope="col">Departamento</th>
                            <th scope="col"></th>
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
                                <form action="modificar_catedra2.php" method="post">
                                    <td><button type="submit" class="btn btn-outline-info" name="seleccion" value="<?php echo $fila['cod_catedra']; ?>"><img src="../Imagenes/Modificar.svg" /> Modificar</button></td>
                                </form>
                                <form action="eliminar_catedra_confirmar.php" method="post">
                                    <td><button type="submit" class="btn btn-danger" name="seleccion" value="<?php echo $fila['cod_catedra']; ?>"><img src="../Imagenes/BorrarBlanco.svg" /> Eliminar</button></td>
                                </form>
                            </tr>

                        <?php
                        }
                        mysqli_free_result($resultado);
                        mysqli_close($link);
                        ?>

                    </tbody>
                </table>
            
        </div>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>