<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM libros
WHERE id = '$id'";

mysqli_query($conexion, $sql);

header("Location: listar.php");

?>