<!DOCTYPE html>
<html>
    <head>
        <?php
        include("../Logic/index.php"); 
        ?>
    </head>

<body>
<?php

$dni=$_SESSION['dni'];

$conn = include("conexion.php");

$sentencia = "SELECT * FROM usuario WHERE dni='$dni'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));;
$existe = mysqli_fetch_assoc($resultado);

if (! $existe) {
?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>El usuario no existe</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>           
                </div>
            </div>
    </div>
<?php

} else {

?>

    <div class="container">
        <br/>
        <h3 align="center">Modificar usuario</h3>
        <form action="modificar_usuario2.php" method="post">
                <div class="form-group col-md-12">
                    <h5>Datos actuales</h5>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2">DNI:</label>
                    <div class="col-md-12">
                    <input name="dni" class="form-control" type="number" value="<?php echo $existe['dni'] ?>">
                    </div>
                </div>
    
                <div class="form-group">
                    <label class="control-label col-md-2">Nombre:</label>
                    <div class="col-md-12">
                    <input name="nombre" class="form-control" type="text" value="<?php echo $existe['nombre'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2">Apellido:</label>
                    <div class="col-md-12">
                    <input name="apellido" class="form-control" type="text" value="<?php echo $existe['apellido'] ?>">
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="control-label col-md-2">Email:</label>
                    <div class="col-md-12">
                    <input name="email" class="form-control" type="email" value="<?php echo $existe['email'] ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-2">Usuario:</label>
                    <div class="col-md-12">
                    <input name="usuario" class="form-control" type="text" value="<?php echo $existe['usuario'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">Contrasena:</label>
                    <div class="col-md-12">
                    <input name="contrasena" class="form-control" type="password" value="<?php echo $existe['contrasena'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">Direccion:</label>
                    <div class="col-md-12">
                    <input name="direccion" class="form-control" type="text" value="<?php echo $existe['direccion'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">Ciudad:</label>
                    <div class="col-md-12">
                    <input name="ciudad" class="form-control" type="text" value="<?php echo $existe['ciudad'] ?>">
                    </div>
                </div>
            
				<div class="form-group">
					<div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Ingresar</button> 
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>           
					</div>
                </div>
        </form>
    </div>


</body>

<?php

}
mysqli_free_result($resultado);
mysqli_close($link);

?>

</html>