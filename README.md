# Entornos Graficos - Cubrir  Vacantes
Repositorio para trabajo practico integrador de la materia Entornos Gráficos acerca del sistema para llamados llamado a cubrir vacantes - UTN FRRO.

Dentro del conexion.php, agregar la ultima linea para que se acomoden los caracteres

    $link = mysqli_connect($hostname,$user,$password) or die ("Problemas de conexión a la base de datos");
    mysqli_select_db($link, "entornos");
    mysqli_set_charset($link, 'utf8'); 
