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
    //session_start();

    $legajo = $_POST['legajo'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];

    $conn = include("conexion.php");


    $sentencia1 = "SELECT dni FROM usuario WHERE usuario='$usuario'";
    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));
    $existe1 = mysqli_fetch_assoc($resultado1);

    if ($existe1) {
    ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h5>El nombre de usuario ingresado ya existe, por favor ingrese otro nombre de usuario</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>
        <?php
    } else {

        $sentencia = "SELECT dni FROM usuario WHERE dni='$dni'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);

        if ($existe) {
        ?>
            <div class="container">
                <div class="form-group col-md-12">
                    <br />
                    <h5>El usuario ingresado ya existe</h5>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </div>
        <?php
        } else {
            $sentencia2 = "INSERT INTO usuario (dni,nombre,apellido,email,usuario,contrasena,es_admin) 
                    values ('$dni','$nombre','$apellido','$email','$usuario','$contrasena','1')";

            mysqli_query($link, $sentencia2) or die(mysqli_error($link));

            $sentencia3 = "INSERT INTO jefe_catedra (legajo, dni, nombre, apellido, email) 
                    VALUES ('$legajo','$dni','$nombre','$apellido','$email')";

            mysqli_query($link, $sentencia3) or die(mysqli_error($link));

        ?>
            <div class="container">
                <div class="form-group col-md-12">
                    <br />
                    <h5>El usuario fue registrado</h5>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    //mysqli_free_result($resultado);
    //mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>