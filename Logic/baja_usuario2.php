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
<?php
//session_start();

$dni = $_POST['dni'];

$conn = include("conexion.php");

$sentencia = "SELECT * FROM usuario WHERE dni='$dni'";
$resultado = mysqli_query($link, $sentencia) or die (mysqli_error($link));;
$existe = mysqli_fetch_assoc($resultado);

if ($existe) {
    $sentencia = "DELETE FROM usuario WHERE dni = '$dni'";

    mysqli_query($link, $sentencia) or die (mysqli_error($link));

?>
    <div class="container">
            <div class="form-group col-md-12">
                <br/>
                <h5>El usuario fue eliminado</h5>
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
            <div class="form-group col-md-12">
                <br/>
                <h5>El usuario ingresado no existe</h5>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>         
                </div>
            </div>
    </div>
<?php

}
mysqli_free_result($resultado);
mysqli_close($link);


?>
</body>