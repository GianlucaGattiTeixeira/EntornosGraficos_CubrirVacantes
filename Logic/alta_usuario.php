<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php
    //session_start();

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];

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
            $sentencia = "INSERT INTO usuario (dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,provincia,es_admin) 
                    values ('$dni','$nombre','$apellido','$email','$usuario','$contrasena','$direccion','$ciudad','$provincia','0')";

            mysqli_query($link, $sentencia) or die(mysqli_error($link));

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