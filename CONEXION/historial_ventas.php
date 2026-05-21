<?php

include("conexion.php");

$sql = "SELECT ventas.id,
ventas.libro_id,
libros.titulo,
ventas.cantidad,
ventas.total

FROM ventas

INNER JOIN libros
ON ventas.libro_id = libros.id";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Historial de Ventas</title>

<style>

body{
    font-family: Arial;
    padding: 30px;
}

table{
    width: 100%;
    border-collapse: collapse;
}

th, td{
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

th{
    background: black;
    color: white;
}

</style>

</head>
<body>

<h1>Historial de Ventas</h1>

<table>

<tr>

<th>ID Venta</th>
<th>ID Libro</th>
<th>Título</th>
<th>Cantidad</th>
<th>Total</th>

</tr>

<?php

while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id']; ?></td>

<td><?php echo $fila['libro_id']; ?></td>

<td><?php echo $fila['titulo']; ?></td>

<td><?php echo $fila['cantidad']; ?></td>

<td>$<?php echo $fila['total']; ?></td>

</tr>

<?php

}

?>

</table>

</body>
</html>