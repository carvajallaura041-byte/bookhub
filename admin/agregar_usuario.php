<?php

include("../includes/conexion.php");

if(isset($_POST['nombre'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios
    (nombre,correo,password,rol)
    VALUES
    ('$nombre','$correo','$password','$rol')";

    mysqli_query($conexion,$sql);

    echo "Usuario agregado";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Agregar Usuario</title>

    <link rel="stylesheet"
          href="../css/styles.css">
</head>
<body>

<form action="" method="POST">

    <h2>Agregar Usuario</h2>

    <input type="text"
           name="nombre"
           placeholder="Nombre"
           required>

    <input type="email"
           name="correo"
           placeholder="Correo"
           required>

    <input type="password"
           name="password"
           placeholder="Contraseña"
           required>

    <select name="rol">

        <option value="admin">
            Admin
        </option>

        <option value="user">
            User
        </option>

    </select>

    <button type="submit">
        Guardar
    </button>

</form>

</body>
</html>