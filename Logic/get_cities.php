<?php
$conn = include("conexion.php");
$sentencia = "SELECT * from localidades where id_provincia=$_GET[state_id]";
$provincia = mysqli_query($link, $sentencia) or die(mysqli_error($link));
$provincias = array();
while ($r = $provincia->fetch_object()) {
	$provincias[] = $r;
}
if (count($provincias) > 0) {
	echo "<option value=''>Seleccione una ciudad</option>";
	foreach ($provincias as $s) {
		echo "<option value='$s->localidad'>$s->localidad</option>";
	}
} else {
	echo "<option value=''>No hay ciudades</option>";
}
?>