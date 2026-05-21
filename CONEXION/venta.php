<?php

include("conexion.php");

$sql = "SELECT * FROM libros";

$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Registrar Venta</title>

<style>

body{
    font-family: Arial;
    padding: 30px;
}

select, input{
    width: 300px;
    padding: 10px;
    margin-bottom: 10px;
}

button{
    width: 320px;
    padding: 10px;
}

</style>

</head>
<body>

<h1>Registrar Venta</h1>

<form action="guardar_venta.php" method="POST">

<select name="libro_id">

<?php

while($fila = mysqli_fetch_assoc($resultado)){

?>

<option value="<?php echo $fila['id']; ?>">

<?php echo $fila['titulo']; ?>

</option>

<?php

}

?>

</select>

<br>

<input type="number"
name="cantidad"
placeholder="Cantidad">

<br>

<button type="submit">
Registrar Venta
</button>

</form>

</body>
</html>