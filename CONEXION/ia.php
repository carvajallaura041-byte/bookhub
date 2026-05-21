<?php

include("conexion.php");


/* LIBRO MÁS VENDIDO */

$sqlMasVendido = "

SELECT libros.titulo,
SUM(ventas.cantidad) AS vendidos

FROM ventas

INNER JOIN libros
ON ventas.libro_id = libros.id

GROUP BY ventas.libro_id

ORDER BY vendidos DESC

LIMIT 1

";

$resultadoMasVendido =
mysqli_query($conexion, $sqlMasVendido);

$masVendido =
mysqli_fetch_assoc($resultadoMasVendido);


/* LIBRO CON MENOS STOCK */

$sqlStock = "

SELECT titulo, stock

FROM libros

ORDER BY stock ASC

LIMIT 1

";

$resultadoStock =
mysqli_query($conexion, $sqlStock);

$stockBajo =
mysqli_fetch_assoc($resultadoStock);


/* INGRESOS TOTALES */

$sqlIngresos = "

SELECT SUM(total) AS ingresos

FROM ventas

";

$resultadoIngresos =
mysqli_query($conexion, $sqlIngresos);

$ingresos =
mysqli_fetch_assoc($resultadoIngresos);

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>IA Librería</title>

<style>

body{

    font-family: Arial;
    padding: 30px;
    background: #f4f4f4;

}

.card{

    background: white;
    padding: 20px;
    margin-bottom: 20px;

    border-radius: 10px;

    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);

}

h2{

    margin-top: 0;

}

</style>

</head>
<body>

<h1>IA Librería Inteligente</h1>

<div class="card">

<h2>📚 Libro Más Vendido</h2>

<p>

<?php

echo $masVendido['titulo'];

?>

</p>

<p>

Vendidos:

<?php

echo $masVendido['vendidos'];

?>

</p>

</div>

<div class="card">

<h2>⚠️ Libro con Menos Stock</h2>

<p>

<?php

echo $stockBajo['titulo'];

?>

</p>

<p>

Stock:

<?php

echo $stockBajo['stock'];

?>

</p>

</div>

<div class="card">

<h2>💰 Ingresos Totales</h2>

<p>

$

<?php

echo $ingresos['ingresos'];

?>

</p>

</div>

</body>
</html>