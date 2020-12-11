<?php
    include_once("../Logic/header.php");
    $mensaje = $_GET['mensaje'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>
    <div class="alert alert-danger" role="alert">
        ¡ERROR! - <?php echo $mensaje;?><a href="index.php" class="alert-link"> Volver al menu principal</a>
    </div>
    <div style="position:fixed; bottom:0;">
        <?php include_once("../Logic/footer.php"); ?>
    </div>
</body>