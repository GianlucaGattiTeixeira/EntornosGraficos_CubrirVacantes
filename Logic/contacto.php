<!DOCTYPE html>
<html>
    <head>
        <?php
            include_once("../Logic/header.php");
        ?>
    </head>
    
  <body>
    <div class="container">
			<form action="../Logic/contacto2.php" method="post">
				<div class="form-group col-md-12">
					<br/>
					<h3>Contacténos</h3>
        </div>
        
        <div class="form-group">
					<label class="control-label col-md-2">Nombre:</label>
					<div class="col-md-10">
					  <input name="nombre" class="form-control" type="text" placeholder="" required>
					</div>
        </div>
        
        <div class="form-group">
					<label class="control-label col-md-2">Email:</label>
					<div class="col-md-10">
					  <input name="email" class="form-control" type="email" placeholder="" required>
					</div>
        </div>
        
				<div class="form-group">
					<label class="control-label col-md-2">Asunto:</label>
					<div class="col-md-10">
					  <input name="asunto" class="form-control" type="text" placeholder="" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Consulta:</label>
					<div class="col-md-10">
            <textarea name="consulta" class="form-control" rows="5" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-2">
						<input name="enviar" type="submit" class="btn btn-primary">           
					</div>
				</div>
			
			</form>
		</div>
      
      <?php
        include_once("../Logic/footer.php");
      ?>
	</body>
</html>