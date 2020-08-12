<!DOCTYPE html>
<html>

<head>
	<?php
	include_once("../Logic/header.php");
	?>

	<script type="text/javascript" src="jquery.min.js"></script>
</head>

<body>
	<?php
	$conn = include("conexion.php");
	$sentencia = "SELECT *
                FROM provincias;";
	$provincia = mysqli_query($link, $sentencia) or die(mysqli_error($link));
	$provincias = array();
	while ($r = $provincia->fetch_object()) {
		$provincias[] = $r;
	}
	?>
	<div class="container">
		<form action="../Logic/alta_usuario.php" method="post">
			<div class="form-group col-md-12">
				<br />
				<h3>Registrarse</h3>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputDni" class="control-label col-md-2">DNI:</label>
					<div class="col-md-12">
						<input id="inputDni" name="dni" class="form-control" type="number" placeholder="">
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="inputNombre" class="control-label col-md-2">Nombre:</label>
					<div class="col-md-12">
						<input id="inputNombre" name="nombre" class="form-control" type="text" placeholder="">
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="inputApellido" class="control-label col-md-2">Apellido:</label>
					<div class="col-md-12">
						<input id="inputApellido" name="apellido" class="form-control" type="text" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputUsuario" class="control-label col-md-2">Usuario:</label>
					<div class="col-md-12">
						<input id="inputUsuario" name="usuario" class="form-control" type="text" placeholder="">
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="inputContrasena" class="control-label col-md-2">Contrasena:</label>
					<div class="col-md-12">
						<input id="inputContrasena" name="contrasena" class="form-control" type="password">
					</div>
				</div>

				<div class="form-group col-md-4">
					<label for="inputEmail" class="control-label col-md-2">Email:</label>
					<div class="col-md-12">
						<input id="inputEmail" name="email" class="form-control" type="email" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputPronvincia" class="control-label col-md-4">Provincia:</label>
					<div class="col-md-12">
						<select id="state_id" class="form-control" name="provincia" required>
							<option value="">Seleccione una provincia</option>
							<?php foreach ($provincias as $c) : ?>
								<option value="<?php echo $c->id; ?>"><?php echo $c->provincia; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<label for="inputCiudad" class="control-label col-md-4">Ciudad:</label>
					<div class="col-md-12">
						<select id="city_id" class="form-control" name="ciudad" required>
							<option value="">Seleccione una ciudad</option>
						</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<label for="inputDireccion" class="control-label col-md-2">Direccion:</label>
					<div class="col-md-12">
						<input id="inputDireccion" name="direccion" class="form-control" type="text" placeholder="Calle-Nro-Piso-Depto">
					</div>
				</div>
			</div>
			<br>
			<div class="form-group">
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">Registrarse</button>
				</div>
			</div>

		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#state_id").change(function() {
				$.get("get_cities.php", "state_id=" + $("#state_id").val(), function(data) {
					$("#city_id").html(data);
					console.log(data);
				});
			});
		});
	</script>
	<?php
	include_once("../Logic/footer.php");
	?>



</body>

</html>