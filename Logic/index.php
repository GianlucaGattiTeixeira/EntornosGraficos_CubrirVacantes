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
  <div align="center">
    <div class="fila">
      <div class="columna" vertical-align=center>
        <img class="a" src="../Imagenes/Logo_UTN.jpg" alt="UTN">
      </div>
      <div class="columna">
        <img class="a" src="../Imagenes/Logo_Facebook.png" alt="Facebook">
      </div>
      <div class="columna">
        <img class="a" src="../Imagenes/Logo_Microsoft.png" alt="Microsoft">
      </div>
    </div>
    <br>
    <div class="fila">
      <div class="columna">
        <img class="a" src="../Imagenes/Logo_Google.jpg" alt="Google">
      </div>
      <div class="columna">
        <img class="a" src="../Imagenes/Logo_IBM.png" alt="IBM">
      </div>
      <div class="columna">
        <img class="a" src="../Imagenes/Logo_Salesforce.png" alt="Salesforce">
      </div>
    </div>
  </div>
  <br>

  <?php
  include_once("../Logic/footer.php");
  ?>
</body>

</html>