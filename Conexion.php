<?php

    $host = "localhost";
    $User = "root";
    $pass = "Dominic11*";

    $db = "dbiniciosesion";

    $conexion = mysqli_connect($host, $User, $pass, $db);

    if (!$con) {
        echo "Conexion fallida";
    }
?>