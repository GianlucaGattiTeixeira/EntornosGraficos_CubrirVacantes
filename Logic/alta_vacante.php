<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<?php
	session_start();
	if (!isset($_SESSION['es_admin']) or ($_SESSION['es_admin'] == 0)) {
		header("Location: ../Logic/index.php");
	} // si no esta logeado o si esta logeado y es usuario comun: sale
	include_once("../Logic/header.php");
	?>
</head>

<body>
	<?php
	$conn = include("conexion.php");
	$sentencia = "SELECT cod_catedra, nombre_catedra FROM catedra";
	$resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
	?>
	<div class="container">
		<form action="../Logic/alta_vacante2.php" method="post">
			<div class="form-group col-md-12">
				<br />
				<h3>Crear vacante</h3>
			</div>

			<div class="form-group">
				<label for="inputCatedra" class="control-label col-md-2">Cátedra:</label>
				<div class="col-md-12">
					<select class="custom-select mr-sm-22" name="cod_catedra" class="col-md-4">
						<?php while ($fila = mysqli_fetch_array($resultado)) { ?>
							<option value="<?= $fila['cod_catedra']; ?>"><?= $fila['nombre_catedra'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label col-md-12">Fecha desde:</label>
					<div class="col-md-12">
						<input id="fecha_desde" name="fecha_desde" class="form-control" type="date" placeholder="AAAA-MM-DD" required>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label col-md-12">Fecha hasta:</label>
					<div class="col-md-12">
						<input id="fecha_hasta" name="fecha_hasta" class="form-control" type="date" placeholder="AAAA-MM-DD" required>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<label class="control-label col-md-12">Informacion:</label>
					<div class="col-md-12">
						<input id="info_general" name="info_general" class="form-control" type="text" placeholder="">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary" onclick="return validacion_alta_vacante();">Ingresar</button>
				</div>
			</div>

		</form>
	</div>
	<?php
	include_once("../Logic/footer.php");
	?>
</body>

</html>