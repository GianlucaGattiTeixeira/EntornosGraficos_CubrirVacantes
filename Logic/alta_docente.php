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

    ?>

    <div class="container">
        <form action="../Logic/alta_docente2.php" method="post">
            <div class="form-group col-md-12">
                <br />
                <h3>Registrar Jefe de Cátedra</h3>
            </div>
            <div class="form-group">
                <label for="inputLegajo" class="control-label col-md-2">Legajo:</label>
                <div class="col-md-10">
                    <input name="legajo" class="form-control" type="number" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputDni" class="control-label col-md-2">DNI:</label>
                <div class="col-md-10">
                    <input id="inputDni" name="dni" class="form-control" type="number" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputNombre" class="control-label col-md-2">Nombre:</label>
                <div class="col-md-10">
                    <input id="inputNombre" name="nombre" class="form-control" type="text" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputApellido" class="control-label col-md-2">Apellido:</label>
                <div class="col-md-10">
                    <input id="inputApellido" name="apellido" class="form-control" type="text" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputUsuario" class="control-label col-md-2">Usuario:</label>
                <div class="col-md-10">
                    <input id="inputUsuario" name="usuario" class="form-control" type="text" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputContrasena" class="control-label col-md-2">Contrasena:</label>
                <div class="col-md-10">
                    <input id="inputContrasena" name="contrasena" class="form-control" type="password" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label col-md-2">Email:</label>
                <div class="col-md-10">
                    <input id="inputEmail" name="email" class="form-control" type="email" placeholder="" required>
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