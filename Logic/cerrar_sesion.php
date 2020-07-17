<?php
    session_start();
    session_destroy();
    header("Location: ../Logic/index.php");
?>