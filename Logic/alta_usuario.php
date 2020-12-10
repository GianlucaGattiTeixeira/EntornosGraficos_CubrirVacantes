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
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];

    if (($dni == "") || ($nombre == "") || ($apellido == "") || ($usuario == "") || ($contrasena == "") || ($email == "") || ($direccion == "") || ($ciudad == "") || ($provincia == "")) {
        header('Location: error.php?mensaje=EXISTEN CAMPOS VACÍOS -');
        exit();
    }

    $conn = include("conexion.php");


    $sentencia1 = "SELECT dni FROM usuario WHERE usuario='$usuario'";
    $resultado1 = mysqli_query($link, $sentencia1) or die(mysqli_error($link));
    $existe1 = mysqli_fetch_assoc($resultado1);
    mysqli_free_result($resultado1);

    if ($existe1) {
        header('Location: error.php?mensaje=Ya existe el nombre de usuario -');
    } else {

        $sentencia = "SELECT dni FROM usuario WHERE dni='$dni'";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $existe = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);

        if ($existe) {
            header('Location: error.php?mensaje=Ya existe un usuario con el dni ingresado -');
        } else {
            $sentencia = "INSERT INTO usuario (dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,provincia,es_admin) values ('$dni','$nombre','$apellido','$email','$usuario','$contrasena','$direccion','$ciudad','$provincia','0')";
            mysqli_query($link, $sentencia) or die(mysqli_error($link));
            header('Location: exito.php?mensaje=Usuario registrado con éxito -');
        }
    }
    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>