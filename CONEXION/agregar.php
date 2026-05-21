<?php

include("conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$sql = "INSERT INTO libros
(titulo, autor, categoria, precio, stock)

VALUES

('$titulo','$autor','$categoria','$precio','$stock')";

$resultado = mysqli_query($conexion, $sql);

if($resultado){

    echo "Libro agregado correctamente";

}else{

    echo "Error al agregar libro";

}

?>