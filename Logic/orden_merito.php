<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['nombre_catedra']) or !isset($_SESSION['dni'])) {
        header("Location: ../Logic/index.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php

    $conn = include("conexion.php");
    $nombre_catedra = $_SESSION['nombre_catedra'];

    $sentencia = "SELECT c.nombre_catedra, v.cod_vacante, v.fecha_hasta, v.info_general, p.dni, p.curriculum, p.cod_curriculum, p.puntaje
            FROM jefe_catedra jc
            INNER JOIN catedra c
            ON jc.legajo = c.legajo
            INNER JOIN vacante v
            ON c.cod_catedra = v.cod_catedra
            INNER JOIN postulacion p 
            ON p.cod_vacante = v.cod_vacante
            WHERE c.nombre_catedra = '$nombre_catedra'
            ORDER BY v.cod_vacante ASC, p.puntaje DESC, dni";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Orden de mérito de la cátedra <?php echo $nombre_catedra; ?></h3>
        </div>
        <form action="orden_merito2.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cod vacante</th>
                        <th scope="col">Dni postulante</th>                        
                        <th scope="col">Nombre cátedra</th>
                        <th scope="col">Fecha hasta</th>
                        <th scope="col">Info general</th>
                        <th scope="col">Curriculum</th>
                        <th scope="col">Puntaje</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo ($fila['cod_vacante']); ?></td>
                            <td><?php echo ($fila['dni']); ?></td>
                            <td><?php echo ($fila['nombre_catedra']); ?></td>
                            <td><?php echo ($fila['fecha_hasta']); ?></td>
                            <td><?php echo ($fila['info_general']); ?></td>
                            <td><a class="linkcv" href="../Archivos/<?php $a = $fila['cod_curriculum'];
                                                                    $b = $fila['curriculum'];
                                                                    echo $a . $b; ?> " target="_blank"> Ver CV</a></td>
                            <td><?php echo ($fila['puntaje']); ?></td>
                            <td><button type="submit" class="btn btn-primary" name="seleccion" value="<?php echo $fila['dni'] . $fila['cod_vacante']; ?>">Seleccionar</button></td>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </form>


        <div class="form-group">
            <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
        </div>
    </div>
    <?php
    mysqli_free_result($resultado);
    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>