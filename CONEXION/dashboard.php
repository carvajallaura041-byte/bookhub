```php
<?php

include("conexion.php");

/* TOTAL LIBROS */

$sqlLibros = "SELECT COUNT(*) AS total_libros
FROM libros";

$resultadoLibros = mysqli_query($conexion, $sqlLibros);

$totalLibros = mysqli_fetch_assoc($resultadoLibros);


/* TOTAL VENTAS */

$sqlVentas = "SELECT COUNT(*) AS total_ventas
FROM ventas";

$resultadoVentas = mysqli_query($conexion, $sqlVentas);

$totalVentas = mysqli_fetch_assoc($resultadoVentas);


/* INGRESOS */

$sqlIngresos = "SELECT SUM(total) AS ingresos
FROM ventas";

$resultadoIngresos = mysqli_query($conexion, $sqlIngresos);

$ingresos = mysqli_fetch_assoc($resultadoIngresos);


/* STOCK BAJO */

$sqlStock = "SELECT COUNT(*) AS stock_bajo
FROM libros
WHERE stock < 5";

$resultadoStock = mysqli_query($conexion, $sqlStock);

$stockBajo = mysqli_fetch_assoc($resultadoStock);


/* DATOS PARA GRÁFICA */

$sqlGrafica = "SELECT titulo, stock
FROM libros";

$resultadoGrafica = mysqli_query($conexion, $sqlGrafica);

$titulos = [];
$stocks = [];

while($fila = mysqli_fetch_assoc($resultadoGrafica)){

    $titulos[] = $fila['titulo'];
    $stocks[] = $fila['stock'];

}

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Dashboard Librería</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{

    font-family: Arial;
    padding: 30px;
    background: #f4f4f4;

}

h1{

    margin-bottom: 30px;

}

.contenedor{

    display: flex;
    gap: 20px;
    flex-wrap: wrap;

}

.card{

    background: white;
    width: 220px;
    padding: 20px;
    border-radius: 10px;

    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);

}

.card h2{

    margin: 0;
    font-size: 20px;

}

.card p{

    font-size: 30px;
    margin-top: 15px;

}

canvas{

    margin-top: 50px;
    background: white;
    padding: 20px;
    border-radius: 10px;

}

</style>

</head>
<body>

<h1>Dashboard Librería Inteligente</h1>

<div class="contenedor">

<div class="card">

<h2>Total Libros</h2>

<p>
<?php echo $totalLibros['total_libros']; ?>
</p>

</div>

<div class="card">

<h2>Total Ventas</h2>

<p>
<?php echo $totalVentas['total_ventas']; ?>
</p>

</div>

<div class="card">

<h2>Ingresos</h2>

<p>
$<?php echo $ingresos['ingresos']; ?>
</p>

</div>

<div class="card">

<h2>Stock Bajo</h2>

<p>
<?php echo $stockBajo['stock_bajo']; ?>
</p>

</div>

</div>

<br><br>

<canvas id="graficaStock"></canvas>

<script>

const ctx = document.getElementById('graficaStock');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: <?php echo json_encode($titulos); ?>,

        datasets: [{

            label: 'Stock de Libros',

            data: <?php echo json_encode($stocks); ?>,

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

</body>
</html>
```
