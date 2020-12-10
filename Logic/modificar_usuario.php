<?php
session_start();
if (!isset($_SESSION['dni'])) {
    header("Location: ../Logic/iniciar_sesion.php");
    exit();
}
include_once("../Logic/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script type="text/javascript" src="jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>

    <?php
    $conn = include("conexion.php");
    $sentencia = "SELECT *
                FROM provincias;";
    $provincia = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $provincias = array();
    mysqli_free_result($provincia);
    while ($r = $provincia->fetch_object()) {
        $provincias[] = $r;
    }
    ?>
    <?php

    $dni = $_SESSION['dni'];

    $conn = include("conexion.php");

    $sentencia = "SELECT * FROM usuario WHERE dni='$dni'";
    $resultado = mysqli_query($link, $sentencia) or die(mysqli_error($link));
    $existe = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);
    
    if (!$existe) {
    ?>
        <div class="container">
            <div class="form-group col-md-12">
                <br />
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
            <br />
            <h3 align="center">Modificar usuario</h3>
            <form action="modificar_usuario2.php" method="post">
                <div class="form-group col-md-12">
                    <h5>Datos actuales</h5>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">DNI:</label>
                        <div class="col-md-12">
                            <input name="dni" class="form-control" type="number" value="<?php echo $existe['dni'] ?>">
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">Nombre:</label>
                        <div class="col-md-12">
                            <input name="nombre" class="form-control" type="text" value="<?php echo $existe['nombre'] ?>">
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">Apellido:</label>
                        <div class="col-md-12">
                            <input name="apellido" class="form-control" type="text" value="<?php echo $existe['apellido'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">Usuario:</label>
                        <div class="col-md-12">
                            <input name="usuario" class="form-control" type="text" value="<?php echo $existe['usuario'] ?>">
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">Contrasena:</label>
                        <div class="col-md-12" style="display: flex;">
                            <input name="contrasena" class="form-control" type="password" id="password" value="<?php echo $existe['contrasena'] ?>">
                            <i style="margin:10px" id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
                        </div>

                    </div>

                    <div class="form-group col-md-4">
                        <label class="control-label col-md-2">Email:</label>
                        <div class="col-md-12">
                            <input name="email" class="form-control" type="email" value="<?php echo $existe['email'] ?>">
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
                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        <a href="../Logic/index.php" class="btn btn-primary">Menu principal</a>
                    </div>
                </div>
            </form>
        </div>
        <script>
            function viewPassword() {
                var passwordInput = document.getElementById('password');
                var passStatus = document.getElementById('pass-status');

                if (passwordInput.type == 'password') {
                    passwordInput.type = 'text';
                    passStatus.className = 'fa fa-eye-slash';

                } else {
                    passwordInput.type = 'password';
                    passStatus.className = 'fa fa-eye';
                }
            }
        </script>
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

<?php

    }
    
    mysqli_close($link);
?>

</html>