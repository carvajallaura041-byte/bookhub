<?php

include("conexion.php");

$libro_id = $_POST['libro_id'];
$cantidad = $_POST['cantidad'];

$sqlLibro = "SELECT * FROM libros
WHERE id='$libro_id'";

$resultadoLibro = mysqli_query($conexion, $sqlLibro);

$libro = mysqli_fetch_assoc($resultadoLibro);

$precio = $libro['precio'];

$total = $precio * $cantidad;

$sqlVenta = "INSERT INTO ventas
(libro_id, cantidad, total)

VALUES

('$libro_id','$cantidad','$total')";

$resultadoVenta = mysqli_query($conexion, $sqlVenta);

if(!$resultadoVenta){

    die(mysqli_error($conexion));

}

$sqlStock = "UPDATE libros
SET stock = stock - $cantidad
WHERE id='$libro_id'";

mysqli_query($conexion, $sqlStock);

echo "Venta registrada correctamente";

?>