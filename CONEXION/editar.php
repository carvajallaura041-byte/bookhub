<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM libros WHERE id = $id";

$resultado = mysqli_query($conexion, $sql);

$fila = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Editar Libro</title>

</head>
<body>

<h1>Editar Libro</h1>

<form action="actualizar.php" method="POST">

<input type="hidden" name="id"
value="<?php echo $fila['id']; ?>">

<input type="text" name="titulo"
value="<?php echo $fila['titulo']; ?>">

<br><br>

<input type="text" name="autor"
value="<?php echo $fila['autor']; ?>">

<br><br>

<input type="text" name="categoria"
value="<?php echo $fila['categoria']; ?>">

<br><br>

<input type="number" name="precio"
value="<?php echo $fila['precio']; ?>">

<br><br>

<input type="number" name="stock"
value="<?php echo $fila['stock']; ?>">

<br><br>

<button type="submit">
Actualizar Libro
</button>

</form>

</body>
</html>