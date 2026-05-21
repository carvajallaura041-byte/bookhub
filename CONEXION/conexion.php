<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "bookhub"
);

if(!$conexion){
    die("Error de conexión");
}

?>