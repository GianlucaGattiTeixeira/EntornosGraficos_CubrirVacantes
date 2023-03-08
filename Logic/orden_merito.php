<?php
session_start();
if (!isset($_SESSION['legajo']) or !isset($_SESSION['dni'])) {
    header("Location: ../Logic/index.php");
    exit();
}
include_once("../Logic/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['catedra'])) {
        $cod_catedra = $_POST['catedra'];
    }

    $conn = include("conexion.php");
    $legajo = $_SESSION['legajo'];

    $sentencia1 = "SELECT DISTINCT c.nombre_catedra, c.cod_catedra
            FROM catedra c
            INNER JOIN vacante v
            ON c.cod_catedra = v.cod_catedra
            INNER JOIN postulacion p 
            ON p.cod_vacante = v.cod_vacante
            WHERE c.legajo = '$legajo' AND c.baja = 0";

    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));

    ?>
    <div class="container">
        <div class="form-group">
            <br />
            <h3>Orden de mérito</h3>
        </div>
        <form action="orden_merito.php" method="POST">
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <select class="custom-select mr-sm-2" id="catedra" name="catedra">
                        <option selected="">Seleccione una cátedra</option>
                        <?php
                        while ($fila = mysqli_fetch_array($resultado1)) {
                        ?>
                            <option value="<?php echo $fila['cod_catedra'] ?>"><?php echo $fila['nombre_catedra']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto my-2">
                    <button type="submit" class="btn btn-secondary">Buscar postulaciones</button>
                </div>
            </div>
        </form>
    </div>


    <?php

    if (isset($cod_catedra)) {
        $sentencia = "SELECT c.nombre_catedra, v.cod_vacante, v.fecha_hasta, v.info_general, v.envio_mail, p.dni, p.curriculum, p.cod_curriculum, p.puntaje
            FROM jefe_catedra jc
            INNER JOIN catedra c
            ON jc.legajo = c.legajo
            INNER JOIN vacante v
            ON c.cod_catedra = v.cod_catedra
            INNER JOIN postulacion p 
            ON p.cod_vacante = v.cod_vacante
            WHERE c.legajo = '$legajo' and c.cod_catedra = '$cod_catedra'
            ORDER BY v.cod_vacante ASC, p.puntaje DESC, dni";

        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

    ?>

        <div class="container">
            <br />
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
                                <td><button type="submit" class="btn btn-primary" name="seleccion" value="<?php echo 'c' . $fila['dni'] . $fila['cod_vacante']; ?>">Calificar</button></td>
                                <td><?php if ($fila['envio_mail'] == 0) { ?>
                                        <button type="submit" class="btn btn-primary" name="seleccion" value="<?php echo 'e' . $fila['dni'] . $fila['cod_vacante']; ?>">Enviar mail</button>
                                    <?php } else { ?>
                                        <p>Mail enviado </p>
                                    <?php } ?>

                                </td>
                            </tr>

                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </form>
        <?php
    }
        ?>



        </div>
        <?php
        include_once("../Logic/footer.php");
        ?>
</body>

</html>