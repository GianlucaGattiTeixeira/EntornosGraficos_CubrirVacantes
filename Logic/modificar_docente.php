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
    <?php
    $conn = include("conexion.php");

    $sentencia = "SELECT DISTINCT jc.*, CASE WHEN ca.cod_catedra IS NULL THEN 0 ELSE 1 END AS tiene_catedras  
                    FROM jefe_catedra jc LEFT JOIN catedra ca ON jc.legajo = ca.legajo";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Modificar jefe de cátedra</h3>
        </div>

        <div class="container">
           
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Legajo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td><?php echo ($fila['legajo']); ?></td>
                                <td><?php echo ($fila['dni']); ?></td>
                                <td><?php echo ($fila['nombre']); ?></td>
                                <td><?php echo ($fila['apellido']); ?></td>
                                <td><?php echo ($fila['email']); ?></td>
                                <form action="modificar_docente2.php" method="post">
                                    <td><button type="submit" class="btn btn-outline-info" name="seleccion" value="<?php echo $fila['legajo']; ?>"><img src="../Imagenes/Modificar.svg" />Modificar</button></td>
                                </form>
                                <?php if(!$fila['tiene_catedras']) {?>
                                    <form action="eliminar_docente_confirmar.php" method="post">
                                        <td>
                                            <button type="submit" class="btn btn-danger" name="seleccion" value="<?php echo $fila['legajo']; ?>"><img src="../Imagenes/BorrarBlanco.svg" />Eliminar  </button>
                                        </td>
                                    </form>
                                <?php }else{ ?>
                                    <td>
                                        <button class="btn btn-danger"  disabled data-toggle="tooltip" data-placement="top" title="No se pudede eliminar, el docente tiene catedras asignadas."><img src="../Imagenes/BorrarBlanco.svg" /> Eliminar </button>
                                    </td>
                                <?php } ?>
                            </tr>

                        <?php
                        }
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