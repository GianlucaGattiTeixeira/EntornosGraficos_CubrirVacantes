<?php
    $hostname="localhost";
    $user="root";
    $password="password";


    $link = mysqli_connect($hostname,$user,$password) or die ("Problemas de conexión a la base de datos");
    mysqli_select_db($link, "prueba");
?>