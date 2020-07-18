<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../Logic/Estilo/estilo.css">
        <?php
        include("../Logic/index.php"); 
        ?>
    </head>
    
 	<body>
        <div class="container">
			<form action="../Logic/login.php" method="post">
				<div class="form-group col-md-12">
					<br/>
					<h3>Iniciar sesion</h3>
				</div>
				<div class="form-group">
					<label for="inputUsuario" class="control-label col-md-2">Usuario:</label>
					<div class="col-md-10">
					<input id="inputUsuario" name="usuario" class="form-control" type="text" placeholder="" >
					</div>
				</div>

				<div class="form-group">
					<label for="inputContrasena" class="control-label col-md-2">Contrasena:</label>
					<div class="col-md-10">
					<input id="inputContrasena" name="contrasena" class="form-control" type="password">
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary">Ingresar</button>            
					</div>
				</div>
			
			</form>
		</div>
	</body>
</html>