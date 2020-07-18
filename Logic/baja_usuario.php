<!DOCTYPE html>
<html>
<<<<<<< HEAD
    <head>
        <title>UTN FRRO</title>        
        <link rel="stylesheet" href="../Logic/Estilo/estilo.css">	    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
=======
	<head>
        <?php
            session_start();
            if (! isset($_SESSION['es_admin']) or ($_SESSION['es_admin']==0) ){header("Location: ../Logic/index.php");} // si no esta logeado o si esta logeado y es usuario comun: sale
            include("../Logic/index.php"); 
        ?>
>>>>>>> b560ba56884cb9cf7c9451238039ec88808b0051
    </head>
    
 	<body>
        <div class="container">
			<form action="../Logic/baja_usuario2.php" method="post">
				<div class="form-group col-md-12">
					<br/>
					<h3>Eliminar usuario</h3>
				</div>

				<?php
					$conn = include("conexion.php");
					$sentencia = "SELECT * FROM usuario WHERE es_admin = 0";
					$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));
				?>

				<div class="form-group col-md-12">
					<select name="dni" class="form-group col-md-4">
						<?php while ($fila = mysqli_fetch_array($resultado)) { ?>
							<option value="<?= $fila['dni']; ?>"><?= $fila['nombre']." ".$fila['apellido'] ; ?></option>
						<?php }?>
					</select>
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