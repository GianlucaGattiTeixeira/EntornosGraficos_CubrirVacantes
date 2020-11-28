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

    $cod_catedra = $_POST['seleccion'];

    $sentencia = "SELECT c.cod_catedra, c.nombre_catedra, jc.legajo, jc.nombre, jc.apellido, d.cod_departamento, d.nombre as nombre_departamento
                    FROM catedra c       
                    INNER JOIN jefe_catedra jc
                    ON c.legajo = jc.legajo                       
                    INNER JOIN departamento d
                    ON c.cod_departamento = d.cod_departamento
                    WHERE  c.cod_catedra = '$cod_catedra'";

    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $fila = mysqli_fetch_array($resultado);
    $_SESSION['cod_catedra'] = $fila['cod_catedra'];

    $legajo = $fila['legajo'];
    $cod_departamento = $fila['cod_departamento'];

    $sentencia2 = "SELECT legajo, nombre, apellido FROM jefe_catedra WHERE legajo != '$legajo'";
    $resultado2 = mysqli_query($link, $sentencia2) or die(mysqli_error($link));

    $sentencia3 = "SELECT cod_departamento, nombre FROM departamento WHERE cod_departamento != '$cod_departamento'";
    $resultado3 = mysqli_query($link, $sentencia3) or die(mysqli_error($link));


    ?>

    <div class="container">
        <br />
        <h3 align="center">Modificar cátedra</h3>
        <form action="modificar_catedra3.php" method="post">
            <div class="form-group col-md-12">
                <h5>Datos actuales</h5>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-4">Codigo cátedra:</label>
                    <div class="col-md-12">
                        <input name="cod_catedra" class="form-control" type="number" value="<?php echo $fila['cod_catedra'] ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2">Catedra:</label>
                    <div class="col-md-12">
                        <input name="nombre_catedra" class="form-control" type="text" value="<?php echo $fila['nombre_catedra'] ?>">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Jefe de cátedra:</label>
                    <div class="col-md-12">
                        <select name="legajo" class="custom-select mr-sm-22">
                            <option value="<?= $fila['legajo']; ?>" selected="true"><?= $fila['nombre'] . " " . $fila['apellido']; ?></option>
                            <?php while ($fila2 = mysqli_fetch_array($resultado2)) { ?>
                                <option value="<?= $fila2['legajo']; ?>"><?= $fila2['nombre'] . " " . $fila2['apellido']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label col-md-12">Departamento:</label>
                    <div class="col-md-12">
                        <select name="cod_departamento" class="custom-select mr-sm-22">
                            <option value="<?= $fila['cod_departamento']; ?>" selected="true"><?= $fila['nombre_departamento']; ?></option>
                            <?php while ($fila3 = mysqli_fetch_array($resultado3)) { ?>
                                <option value="<?= $fila3['cod_departamento']; ?>"><?= $fila3['nombre']; ?></option>
                            <?php } ?>
                        </select>
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

    include_once("../Logic/footer.php");

    ?>

</body>

</html>