<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>   
        <link rel="stylesheet" href="../Logic/Estilo/estilo.css">     	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="icon" href="../Imagenes/UtnLogo.gif">
        <?php
          if(!isset($_SESSION)) 
          { 
            session_start(); 
          } 
        ?>
    </head>
    
 	<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../Logic/index.php"><img src="../Imagenes/UtnLogo.gif" alt="UTN Logo" width="30" height="40"></img></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="../Logic/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Logic/vacantes.php">Listado Vacantes</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="vacanteDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vacantes
                  </a>
                  <div class="dropdown-menu" aria-labelledby="vacanteDropdown">
                    <a class="dropdown-item" href="../Logic/alta_vacante.php">Alta Vacante</a>
                    <a class="dropdown-item" href="../Logic/bm_vacante.php">Modificar-Eliminar Vacante</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="postulacionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Postulaciones
                  </a>
                  <div class="dropdown-menu" aria-labelledby="postulacionDropdown">
                    <a class="dropdown-item" href="../Logic/postulaciones.php">Postulaciones</a>
                    <a class="dropdown-item" href="../Logic/baja_postulacion.php">Baja Postulacion</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Logic/contacto.php">Contacto</a>
                </li>
              </ul>

              <?php
                if (isset($_SESSION['usuario'])){
              ?>
              <ul class="navbar-nav mr-right">

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                      <path d="M13.784 14c-.497-1.27-1.988-3-5.784-3s-5.287 1.73-5.784 3h11.568z"/>
                      <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <?php echo $_SESSION['usuario']?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="usuarioDropdown">
                    <a class="dropdown-item" href="../Logic/modificar_usuario.php">Modificar Usuario</a>
                    <a class="dropdown-item" href="../Logic/baja_usuario.php">Baja Usuario</a>
                  </div>
                </li>

                <li>
                  <a href="../Logic/cerrar_sesion.php" class="nav-link">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 1a1 1 0 0 0-1 1v13H1.5a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2a1 1 0 0 0-1-1H4zm2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    Logout
                  </a>
                </li> 
              </ul>
              <?php 
                }else{
              ?>
              <ul class="navbar-nav mr-right">
                <li>
                  <a href="iniciar_sesion.php" class="nav-link">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                      <path d="M13.784 14c-.497-1.27-1.988-3-5.784-3s-5.287 1.73-5.784 3h11.568z"/>
                      <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Login
                  </a>
                </li>

                <li>
                  <a href="registrarse.php" class="nav-link">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                      <path d="M13.784 14c-.497-1.27-1.988-3-5.784-3s-5.287 1.73-5.784 3h11.568z"/>
                      <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Registrarse
                  </a>
                </li>
              </ul>

              <?php
                 
                }
              ?>
            </div>
          </nav>
	</body>
</html>