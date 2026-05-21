<?php

include("conexion.php");

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$sql = "UPDATE libros SET

titulo='$titulo',
autor='$autor',
categoria='$categoria',
precio='$precio',
stock='$stock'

WHERE id='$id'";

mysqli_query($conexion, $sql);

header("Location: listar.php");

?>