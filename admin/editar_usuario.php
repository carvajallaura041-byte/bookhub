<?php

include("../includes/conexion.php");

/* OBTENER ID */
$id = $_GET['id'];

/* BUSCAR USUARIO */
$sql = "SELECT * FROM usuarios WHERE id='$id'";

$resultado = mysqli_query($conexion, $sql);

$usuario = mysqli_fetch_assoc($resultado);

/* ACTUALIZAR */
if(isset($_POST['nombre'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $update = "UPDATE usuarios
    SET
    nombre='$nombre',
    correo='$correo',
    rol='$rol'
    WHERE id='$id'";

    mysqli_query($conexion, $update);

    echo "Usuario actualizado";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Editar Usuario</title>

    <link rel="stylesheet"
          href="../css/styles.css">

</head>
<body>

<form action="" method="POST">

    <h2>Editar Usuario</h2>

    <input type="text"
           name="nombre"
           value="<?php echo $usuario['nombre']; ?>">

    <input type="email"
           name="correo"
           value="<?php echo $usuario['correo']; ?>">

    <select name="rol">

        <option value="admin">
            Admin
        </option>

        <option value="user">
            User
        </option>

    </select>

    <button type="submit">
        Actualizar
    </button>

</form>

</body>
</html>