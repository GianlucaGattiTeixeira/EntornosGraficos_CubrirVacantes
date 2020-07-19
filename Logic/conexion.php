<?php
    $hostname="localhost";
    $user="gian";
    $password="gian";


    $link = mysqli_connect($hostname,$user,$password) or die ("Problemas de conexión a la base de datos");
    mysqli_select_db($link, "entornos");
    mysqli_set_charset($link, "utf8");
?>
