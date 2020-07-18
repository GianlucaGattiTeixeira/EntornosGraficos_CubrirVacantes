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
			<form action="../Logic/alta_vacante2.php" method="post">
				<div class="form-group col-md-12">
					<br/>
					<h3>Crear vacante</h3>
				</div>
                <div class="form-group">
					<label class="control-label col-md-4">Codigo catedra:</label>
					<div class="col-md-10">
					<input name="cod_catedra" class="form-control" type="number" placeholder="" >
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-md-4">Cantidad de puestos:</label>
					<div class="col-md-10">
					<input name="cant_puestos" class="form-control" type="number" placeholder="" >
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Fecha desde:</label>
					<div class="col-md-10">
					<input name="fecha_desde" class="form-control" type="datetime-local" placeholder="AAAA-MM-DD HH:MM:SS" >
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Fecha hasta:</label>
					<div class="col-md-10">
					<input name="fecha_hasta" class="form-control" type="datetime-local" placeholder="AAAA-MM-DD HH:MM:SS">
					</div>
				</div>

                <div class="form-group">
					<label class="control-label col-md-2">Informacion:</label>
					<div class="col-md-10">
					<input name="info_general" class="form-control" type="text" placeholder="" >
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