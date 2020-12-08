<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <?php
  include_once("../Logic/header.php");
  if (!isset($_SESSION)) {
    session_start();
  }
  ?>
  <style>
    * {
      box-sizing: border-box;
    }

    .columna {
      float: left;
      width: 33%;
      padding-left: 5px;
      padding-right: 5px;
    }

    .fila {
      width: 60%;
      content: "";
      clear: both;
      display: table;
    }

    img.a {
      width: 100%;
      vertical-align: 50%
    }
  </style>
</head>

<body>
  <br>
  <div align="center" vertical-align="center">
    <div class="fila" style="margin-top: 120px;">
        <a href="https://www.frro.utn.edu.ar/" target="_blanck"><img class="a" src="../Imagenes/Logo_UTN.png" alt="UTN" width="1000px" height="200px"></a>
    </div>
  </div>
  <br>

  <?php
  include_once("../Logic/footer.php");
  ?>
</body>

</html>