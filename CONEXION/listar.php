<?php

include("conexion.php");

$sql = "SELECT * FROM libros";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>

    <style>

        body{
            font-family: Arial;
            padding: 20px;
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

<h1>Libros Registrados</h1>

<table>

<tr>
    <th>ID</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Categoría</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

<?php

while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['titulo']; ?></td>
<td><?php echo $fila['autor']; ?></td>
<td><?php echo $fila['categoria']; ?></td>
<td><?php echo $fila['precio']; ?></td>
<td><?php echo $fila['stock']; ?></td>

<td>

<a href="editar.php?id=<?php echo $fila['id']; ?>">
Editar
</a>

<br><br>

<a href="eliminar.php?id=<?php echo $fila['id']; ?>">
Eliminar
</a>

</td>

</tr>

<?php

}

?>

</table>

</body>
</html>