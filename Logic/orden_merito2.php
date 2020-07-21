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

    $seleccion = $_POST['seleccion'];
    //echo $seleccion;

    $dni = substr($seleccion, 0, 8);
    $cod_vacante = substr($seleccion, 8);
    //echo ($dni.' - '.$cod_vacante);

    $dni = (int) $dni;
    $cod_vacante = (int) $cod_vacante;
    //echo (' - '.var_dump($cod_vacante));

    $conn = include("conexion.php");
    $nombre_catedra = $_SESSION['nombre_catedra'];

    $sentencia = "SELECT v.cod_vacante, v.info_general, u.dni, u.nombre, u.apellido, u.email, p.puntaje, p.curriculum, p.cod_curriculum
                FROM jefe_catedra jc
                INNER JOIN catedra c
                ON jc.legajo = c.legajo
                INNER JOIN vacante v
                ON c.cod_catedra = v.cod_catedra
                INNER JOIN postulacion p 
                ON p.cod_vacante = v.cod_vacante
                INNER JOIN usuario u
                ON p.dni = u.dni
                WHERE u.dni = '$dni' and v.cod_vacante = '$cod_vacante'";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_assoc($resultado);

    ?>
    <div class="container">
        <form action="orden_merito2.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <h3>Calificar postulación para la cátedra <?php echo $nombre_catedra; ?></h3>
                    <br />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-4">Cod Vacante:</label>
                        <div class="col-md-12">
                            <input name="cod_vacante" class="form-control" type="number" value="<?php echo $fila['cod_vacante'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Info general:</label>
                        <div class="col-md-12">
                            <input name="info_general" class="form-control" type="text" value="<?php echo $fila['info_general'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Dni:</label>
                        <div class="col-md-12">
                            <input name="dni" class="form-control" type="text" value="<?php echo $fila['dni'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Nombre:</label>
                        <div class="col-md-12">
                            <input name="nombre" class="form-control" type="text" value="<?php echo $fila['nombre'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Apellido:</label>
                        <div class="col-md-12">
                            <input name="apellido" class="form-control" type="text" value="<?php echo $fila['apellido'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Email:</label>
                        <div class="col-md-12">
                            <input name="email" class="form-control" type="email" value="<?php echo $fila['email'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Puntaje:</label>
                        <div class="col-md-12">
                            <input name="puntaje" class="form-control" type="number" min="0" max="100" step="1">
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div align="center">
                            <iframe width="600px" height="600px" src="../Archivos/<?php $a = $fila['cod_curriculum'];
                                                                                    $b = $fila['curriculum'];
                                                                                    echo $a . $b; ?>"> </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>

        </form>
    </div>

    <?php
    mysqli_free_result($resultado);
    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>