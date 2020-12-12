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
    if (isset($_POST['enviar'])) {
        if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['asunto']) && !empty($_POST['consulta'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto'];
            $consulta = $_POST['consulta'];
            //mail($email,$asunto,$consulta);
            echo '<script>window.location.replace("exito.php?mensaje=Email enviado correctamente -");</script>';
        }
    }
    include_once("../Logic/footer.php");
    ?>
</body>
</html>