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
    <?php
    $conn = include("conexion.php");

    $sentencia = "SELECT * FROM usuario";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Modificar usuario</h3>
        </div>

        <div class="container">
            <form action="modificacion_usuario2.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td><?php echo ($fila['dni']); ?></td>
                                <td><?php echo ($fila['nombre']); ?></td>
                                <td><?php echo ($fila['apellido']); ?></td>
                                <td><button type="submit" class="btn btn-outline-info" style="color: blue;" name="seleccion" value="<?php echo $fila['dni']; ?>"><img src="../Imagenes/Modificar.svg"/>Modificar</button></td>
                            </tr>

                        <?php
                        }
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