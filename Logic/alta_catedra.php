<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
        header("Location: ../Logic/index.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>

    <?php
    $conn = include("conexion.php");
    $sentencia = "SELECT legajo, nombre, apellido FROM jefe_catedra";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));

    $sentencia1 = "SELECT cod_departamento, nombre FROM departamento";
    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));
    ?>

    <div class="container">
        <form action="../Logic/alta_catedra2.php" method="post">
            <div class="form-group col-md-12">
                <br />
                <h3>Registrar Cátedra</h3>
            </div>
            <div class="form-group">
                <label for="inputNombre" class="control-label col-md-2">Nombre cátedra:</label>
                <div class="col-md-10">
                    <input name="nombre_catedra" class="form-control" type="text" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="inputDepartamento" class="control-label col-md-2">Jefe de cátedra:</label>
                <div class="col-md-10">
                    <select name="legajo" class="col-md-4">
                        <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?= $fila['legajo']; ?>"><?= $fila['nombre'] . " " . $fila['apellido']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputDepartamento" class="control-label col-md-2">Departamento:</label>
                <div class="form-group col-md-10">
                    <select name="cod_departamento" class="form-group col-md-4">
                        <?php while ($fila1 = mysqli_fetch_array($resultado1)) { ?>
                            <option value="<?= $fila1['cod_departamento']; ?>"><?= $fila1['nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </div>
        </form>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>