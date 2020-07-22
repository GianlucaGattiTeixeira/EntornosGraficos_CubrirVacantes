<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!isset($_SESSION['dni'])) {
        header("Location: ../Logic/iniciar_sesion.php");
    }
    include_once("../Logic/header.php");
    ?>
</head>

<body>
    <?php
    $dni = $_SESSION['dni'];
    $cod_vacante = $_SESSION['cod_vacante'];

    $conn = include("conexion.php");

    $sentencia = "SELECT * FROM postulacion WHERE dni='$dni' and cod_vacante='$cod_vacante'";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $existe = mysqli_fetch_assoc($resultado);

    if ($existe) {
    ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h5>Ya te has postulado a la vacante seleccionada</h5>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>

    <?php
    } else {

        //generar el cod_curriculum para identificar el cv en la carpeta Archivos
        $sentencia = "SELECT MAX(cod_curriculum) as cod_curriculum FROM postulacion";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $fila = mysqli_fetch_array($resultado);
        if (isset($fila['cod_curriculum'])) {
        $cod_curriculum = $fila['cod_curriculum'];
        $cod_curriculum = $cod_curriculum + 1;
        } else {
        $cod_curriculum = 1;
        }

        //asignar nombre y la ruta para almacenar el archivo (cv)
        $nombre = $_FILES['archivo']['name'];
        $ruta = $_FILES['archivo']['tmp_name'];
        $destino = "../Archivos/" . $cod_curriculum . $nombre;

        //almacena el cv en la carpeta Archivos
        move_uploaded_file($ruta, $destino);


        //registrar la postulacion a la bd
        $sentencia2 = "INSERT INTO postulacion(dni,cod_vacante,fecha_hora,curriculum,cod_curriculum) VALUES ('$dni', '$cod_vacante', now(), '$nombre', '$cod_curriculum');";
        $resultado2 = mysqli_query($link, $sentencia2) or die(mysqli_error($link));



        ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
                <h5>Su curriculum ha sido enviado</h5>
            </div>

            <div class="form-group">
                <div class="col-md-2">
                    <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                </div>
            </div>
        </div>





    <?php
    }
    include_once("../Logic/footer.php");
    ?>

</body>

</html>