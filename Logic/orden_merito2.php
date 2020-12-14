<?php
session_start();
if (!isset($_SESSION['legajo']) or !isset($_SESSION['dni'])) {
    header("Location: ../Logic/index.php");
    exit();
}
include_once("../Logic/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<body>
    <?php

    $seleccion = $_POST['seleccion'];
    //echo $seleccion;

    $opcion = substr($seleccion, 0, 1);
    $dni = substr($seleccion, 1, 8);
    $cod_vacante = substr($seleccion, 9);
    //echo ($opcion .' - '. $dni.' - '.$cod_vacante);

    $dni = (int) $dni;
    $cod_vacante = (int) $cod_vacante;
    //echo (' - '.var_dump($cod_vacante));

    $conn = include("conexion.php");

    if ($opcion == 'c') {

        $sentencia = "SELECT v.cod_vacante, v.info_general, u.dni, u.nombre, u.apellido, u.email, p.puntaje, p.curriculum, p.cod_curriculum
                FROM jefe_catedra jc
                INNER JOIN catedra c
                ON jc.legajo = c.legajo
                INNER JOIN vacante v
                ON c.cod_catedra = v.cod_catedra
                INNER JOIN postulacion p 
                ON p.cod_vacante = v.cod_vacante
                INNER JOIN usuario u
                ON p.dni = u.dni
                WHERE u.dni = '$dni' and v.cod_vacante = '$cod_vacante'";

        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        $fila = mysqli_fetch_assoc($resultado);
        mysqli_free_result($resultado);

    ?>
        <div class="container">
            <form action="orden_merito3.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <h3>Calificar postulación</h3>
                        <br />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Cod Vacante:</label>
                            <div class="col-md-12">
                                <input name="cod_vacante" class="form-control" type="number" value="<?php echo $fila['cod_vacante'] ?>" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Info general:</label>
                            <div class="col-md-12">
                                <input name="info_general" class="form-control" type="text" value="<?php echo $fila['info_general'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Dni:</label>
                            <div class="col-md-12">
                                <input name="dni" class="form-control" type="text" value="<?php echo $fila['dni'] ?>" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Nombre:</label>
                            <div class="col-md-12">
                                <input name="nombre" class="form-control" type="text" value="<?php echo $fila['nombre'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Apellido:</label>
                            <div class="col-md-12">
                                <input name="apellido" class="form-control" type="text" value="<?php echo $fila['apellido'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Email:</label>
                            <div class="col-md-12">
                                <input name="email" class="form-control" type="email" value="<?php echo $fila['email'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Puntaje:</label>
                            <div class="col-md-12">
                                <input name="puntaje" placeholder="0-100" class="form-control" type="number" min="0" max="100" step="1" value="<?php if (isset($fila['puntaje'])) {
                                                                                                                                echo $fila['puntaje'];
                                                                                                                            }  ?>">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div align="center">
                                <iframe width="600px" height="600px" src="../Archivos/<?php $a = $fila['cod_curriculum'];
                                                                                        $b = $fila['curriculum'];
                                                                                        echo $a . $b; ?>"> </iframe>
                            </div>
                        </div>
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

    <?php

    } else {
        //se hace el envio de mail al usuario ganador y se modifica la tabla vacante (atributo envio de mail)

        $sentencia =
            "SELECT u.dni, u.nombre, u.apellido, u.email
                FROM postulacion p
                INNER JOIN vacante v
                ON p.cod_vacante = v.cod_vacante               
                INNER JOIN usuario u
                ON p.dni = u.dni                  
                WHERE v.cod_vacante='$cod_vacante'
                ORDER BY puntaje DESC  
                LIMIT 1";
        $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
        mysqli_free_result($resultado);
        $usuario = mysqli_fetch_assoc($resultado);


        $sentencia2 = "SELECT * FROM vacante WHERE cod_vacante='$cod_vacante'";
        $resultado2 = mysqli_query($link, $sentencia2) or die(mysqli_error($link));
        mysqli_free_result($resultado2);
        $vac = mysqli_fetch_assoc($resultado2);

        //envio de mail
        $nombre = $usuario['nombre'];
        $email = $usuario['email'];
        $asunto = 'Resultado orden de mérito';
        $cuerpo = 'Felicitaciones ' . $nombre . '! Usted ha sido elegido como jefe de catedra';
        //mail($email,$asunto,$cuerpo);
        //modificar tabla vacante
        $sentencia3 ="UPDATE vacante SET envio_mail='1' WHERE cod_vacante='$cod_vacante'";
        mysqli_query($link, $sentencia3) or die(mysqli_error($link));
    ?>
        <div class="container">
            <div class="form-group">
                <br />
                <h4>Mail enviado.</h4>
                <br />
                <h5>Detalle: </h5>
                <p>Nombre del usuario: <?php echo $usuario['nombre'] . ' ' . $usuario['apellido']  ?></p>
                <p>Email del usuario: <?php echo $usuario['email'] ?></p>
                <p>Vacante: <?php echo $vac['cod_vacante'] ?></p>
            </div>

            <div class="form-group">
                <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
            </div>
        </div>
    <?php
    }
    mysqli_close($link);
    include_once("../Logic/footer.php");
    ?>
</body>

</html>