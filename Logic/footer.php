<!DOCTYPE html>
<html>
  <head>
    <?php
      if(!isset($_SESSION)) 
      { 
        session_start(); 
      } 
    ?>      
  </head>
  <body>
    <br></br>

    <footer class="footer" style="background-color:#F8F9FA">	
      <hr></hr> 
      <div class="container text-center"> 
        <div class="row text-center text-md-left mt-3 pb-3">   
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 align="center" class="text-uppercase mb-4 font-weight-bold" style="line-height:3px">UTN FRRO</h6>
            <p align="center">Universidad Tecnológica Nacional</p>
          </div>   
          <hr class="w-100 clearfix d-md-none">
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 align="center" class="text-uppercase mb-4 font-weight-bold" style="line-height:3px">Información</h6>
            <p align="center">
            <i class="fas fa-home mr-3"></i> Zeballos 1341, Rosario, Argentina</p>
            <p align="center">
            <i class="fas fa-envelope mr-3"></i> universidad@utnfrro.com.ar</p>
            <p align="center">
            <i class="fas fa-phone mr-3"></i> 341 - 448 1871</p>
          </div>
        </div>
      </div>
    <hr></hr>
    </footer>
  </body>
</html>