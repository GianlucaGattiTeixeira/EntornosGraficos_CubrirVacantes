<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php //include_once("../Logic/index.php"); 
    ?>
</head>
<body>
    <?php

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    if (($usuario == "") || ($contrasena == "")) {
        echo '<script>window.location.replace("error.php?mensaje=Existen campos vacíos -");</script>';
    }

    $conn = include("conexion.php");
    $sentencia = "SELECT dni,nombre,apellido,email,usuario,contrasena,direccion,ciudad,es_admin FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $existe = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);

    if ($existe) {
        session_start();
        $_SESSION['dni'] = $existe['dni'];
        $_SESSION['usuario'] = $existe['usuario'];
        $_SESSION['es_admin'] = $existe['es_admin'];

        $sentencia2 = "SELECT * FROM usuario u INNER JOIN jefe_catedra jc ON u.dni = jc.dni INNER JOIN catedra c ON jc.legajo = c.legajo WHERE u.usuario='$usuario' and u.contrasena='$contrasena'";
        $resultado2 = mysqli_query($link, $sentencia2) or die(mysqli_error($link));
        $existe2 = mysqli_fetch_assoc($resultado2);
        mysqli_free_result($resultado2);
        if ($existe2) {
            $_SESSION['legajo'] = $existe2['legajo'];
        }

        header("Location: ../Logic/index.php");
		exit();
    } else {
        include_once("../Logic/header.php");
        echo '<script>window.location.replace("error.php?mensaje=Usuario y/o contraseña incorrectos -");</script>';
    }
    mysqli_close($link);
    ?>
</body>
</html>