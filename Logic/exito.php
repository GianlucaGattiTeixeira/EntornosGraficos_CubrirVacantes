<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <?php
    include_once("../Logic/header.php");
    $mensaje = $_GET['mensaje'];
    ?>
</head>
<body>
    <div class="alert alert-success" role="alert">
        ¡ÉXITO! - <?php echo $mensaje;?><a href="index.php" class="alert-link"> Volver al menu principal</a>
    </div>
</body>