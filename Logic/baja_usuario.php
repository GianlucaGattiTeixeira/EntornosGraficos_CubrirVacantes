<!DOCTYPE html>
<html>
	<head>
        <?php
            session_start();
            if (! isset($_SESSION['es_admin']) or ($_SESSION['es_admin']==0) ){header("Location: ../Logic/index.php");} // si no esta logeado o si esta logeado y es usuario comun: sale
            include("../Logic/index.php"); 
        ?>
    </head>
    
 	<body>
        <div class="container">
			<form action="../Logic/baja_usuario2.php" method="post">
				<div class="form-group col-md-12">
					<br/>
					<h3>Eliminar usuario</h3>
				</div>
                <div class="form-group">
					<label class="control-label col-md-4">Ingrese el DNI:</label>
					<div class="col-md-10">
					<input name="dni" class="form-control" type="number" placeholder="" >
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