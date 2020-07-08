<!DOCTYPE html>
<html>
    <head>
        <title>UTN FRRO</title>        	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
 	<body>
        <div class="container">
			<form action="princ.php" method="post">
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
					<label for="inputPassword" class="control-label col-md-2">Contrasena:</label>
					<div class="col-md-10">
					<input id="inputPassword" name="password" class="form-control" type="password">
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