<?php

session_start();

include("../includes/conexion.php");

$sql = "SELECT * FROM usuarios";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Usuarios</title>

    <link rel="stylesheet"
          href="../css/styles.css">

</head>
<body>

<!-- NAVBAR -->
<?php include("../includes/navbar.php"); ?>

<!-- SIDEBAR -->
<?php include("../includes/sidebar.php"); ?>

<!-- CONTENIDO -->
<div class="main-content">

<h1>Lista de Usuarios</h1>

<a href="agregar_usuario.php">
    Agregar Usuario
</a>

<br><br>

<table border="1">

    <tr>

        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Acciones</th>

    </tr>

<?php

while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

    <td>
        <?php echo $fila['id']; ?>
    </td>

    <td>
        <?php echo $fila['nombre']; ?>
    </td>

    <td>
        <?php echo $fila['correo']; ?>
    </td>

    <td>
        <?php echo $fila['rol']; ?>
    </td>

    <td>

        <a href="editar_usuario.php?id=<?php echo $fila['id']; ?>">
            Editar
        </a>

        |

        <a href="eliminar_usuario.php?id=<?php echo $fila['id']; ?>">
            Eliminar
        </a>

    </td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>