<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php
    session_start();
    if (!isset($_SESSION['dni'])) {
        header("Location: ../Logic/index.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php

    $conn = include("conexion.php");

    $es_admin = $_SESSION['es_admin'];

    if ($es_admin == 1) {
        $sentencia = "SELECT * FROM postulacion ORDER BY fecha_hora ASC";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    } else {
        $dni = $_SESSION['dni'];
        $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' ORDER BY fecha_hora ASC";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    }


    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Eliminar postulacion</h3>
        </div>
        <form action="baja_postulacion2.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Cod Vacante</th>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Nombre CV</th>
                        <th scope="col">Codigo CV</th>
                        <th scope="col">Curriculum</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo ($fila['dni']); ?></td>
                            <td><?php echo ($fila['cod_vacante']); ?></td>
                            <td><?php echo ($fila['fecha_hora']); ?></td>
                            <td><?php echo ($fila['curriculum']); ?></td>
                            <td><?php echo ($fila['cod_curriculum']); ?></td>
                            <td><a class="linkcv" href="../Archivos/<?php $a = $fila['cod_curriculum'];
                                                                    $b = $fila['curriculum'];
                                                                    echo $a . $b; ?> " target="_blank"><img src="../Imagenes/Ver.svg"/>Ver CV</a></td>
                            <td><button type="submit" style="color: red;"class="btn btn btn-outline-danger" name="seleccion" value="<?php echo $fila['dni'] . $fila['fecha_hora'] . $fila['cod_vacante']; ?>"><img src="../Imagenes/Borrar.svg"/> Eliminar</button></td>
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
    </div>
    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>