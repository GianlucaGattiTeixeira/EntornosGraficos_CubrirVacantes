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

            echo $asunto . " - " . $consulta . " - " . $nombre . " - " . $email;

            $destinatario = "danidruetta_97@hotmail.com";
            $headers = "From: " . $nombre . " <" . $email . ">\r\n";

            //mail($destinatario,$asunto,$consulta,$headers);
            printf("Enviado");
        }
    }


    ?>
    <div class="container">
        <div class="form-group">
            <h5>El mensaje fue enviado</h5>
        </div>

        <div class="form-group">
            <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
        </div>
    </div>

    <?php
    include_once("../Logic/footer.php");
    ?>
</body>

</html>