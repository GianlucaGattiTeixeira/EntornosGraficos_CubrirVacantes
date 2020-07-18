<!DOCTYPE html>
<html>
    <head>
        <?php
          include_once("../Logic/header.php");
          if(!isset($_SESSION)) 
          { 
            session_start(); 
          } 
        ?>
    </head>
    
 	<body>
      <br></br>
      <div align="center">
        <img src="https://media.lacapital.com.ar/adjuntos/203/imagenes/028/426/0028426054.jpg">
      </div>
      
      <?php
        include_once("../Logic/footer.php");
      ?>
	</body>
</html>