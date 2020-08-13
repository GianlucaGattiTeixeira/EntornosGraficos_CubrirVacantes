<!DOCTYPE html>
<html>

<head>
	<?php
	include_once("../Logic/header.php");
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
	<div class="container">
		<form action="../Logic/login.php" method="post">
			<div class="form-group col-md-12">
				<br />
				<h3>Iniciar sesion</h3>
			</div>
			<div class="form-group">
				<label for="inputUsuario" class="control-label col-md-2">Usuario:</label>
				<div class="col-md-10">
					<input id="inputUsuario" name="usuario" class="form-control" type="text" placeholder="">
				</div>
			</div>

			<div class="form-group">
				<label for="inputContrasena" class="control-label col-md-2">Contraseña:</label>
				<div class="col-md-10" style="display: flex;">
					<input id="inputContrasena" name="contrasena" class="form-control" type="password">
					<i style="margin:10px" id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
			</div>

		</form>
	</div>
	<script>
		function viewPassword() {
			var passwordInput = document.getElementById('inputContrasena');
			var passStatus = document.getElementById('pass-status');

			if (passwordInput.type == 'password') {
				passwordInput.type = 'text';
				passStatus.className = 'fa fa-eye-slash';

			} else {
				passwordInput.type = 'password';
				passStatus.className = 'fa fa-eye';
			}
		}
	</script>
	<?php
	include_once("../Logic/footer.php");
	?>
</body>

</html>