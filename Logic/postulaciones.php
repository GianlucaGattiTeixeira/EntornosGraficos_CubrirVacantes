<?php
session_start();
if (!isset($_SESSION['dni'])) {
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

    $conn = include("conexion.php");
    $es_admin = $_SESSION['es_admin'];

    if ($es_admin == 1) {
        $sentencia = "SELECT p.*, c.baja, c.nombre_catedra FROM postulacion p
            INNER JOIN vacante v on v.cod_vacante = p.cod_vacante
            INNER JOIN catedra c on c.cod_catedra = v.cod_catedra
            ORDER BY fecha_hora ASC";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        
    } else {
        $dni = $_SESSION['dni'];
        $sentencia = "SELECT p.*, c.baja, c.nombre_catedra FROM postulacion p
                        INNER JOIN vacante v on v.cod_vacante = p.cod_vacante
                        INNER JOIN catedra c on c.cod_catedra = v.cod_catedra 
                        WHERE dni='$dni' AND c.baja = 0
                        ORDER BY fecha_hora ASC";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    }

    ?>
    <div class="container">
        <div class="form-group col-md-12">
            <br />
            <h3>Postulaciones</h3>
        </div>
        <form action="seleccion_vacante.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Cod Vacante</th>
                        <th scope="col">Cátedra</th>
                        <th scope="col">Fecha y hora</th>
                        <th scope="col">Nombre CV</th>
                        <th scope="col">Codigo CV</th>
                        <th scope="col">Curriculum</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo ($fila['dni']); ?></td>
                            <td><?php echo ($fila['cod_vacante']); ?></td>
                            <td><?php echo ($fila['nombre_catedra']); if($fila['baja'] == 1 ){ echo("(baja)");} ?></td>
                            <td><?php echo ($fila['fecha_hora']); ?></td>
                            <td><?php echo ($fila['curriculum']); ?></td>
                            <td><?php echo ($fila['cod_curriculum']); ?></td>
                            <td><a class="linkcv" href="../Archivos/<?php $a = $fila['cod_curriculum'];
                                                                    $b = $fila['curriculum'];
                                                                    echo $a . $b; ?> " target="_blank"> Ver CV</a></td>
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