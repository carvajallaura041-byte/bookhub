<?php 
session_start();

if($_SESSION['rol'] != 'admin'){
    header("Location: ../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>Dashboard Admin</title>

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

    <h1>
        Bienvenido ADMIN:
        <?php echo $_SESSION['nombre']; ?>
    </h1>

    <br>

    <div class="card">

        <h2>Panel Administrador</h2>

        <p>
            Bienvenido al sistema BookHub.
        </p>

    </div>

    <div class="card">

        <h3>Usuarios registrados</h3>

        <p>
            Aquí podrás administrar usuarios.
        </p>

    </div>

</div>

</body>
</html>