<?php
session_start();

if($_SESSION['rol'] != 'user'){
    header("Location: ../login/login.php");
}
?>

<h1>
Bienvenido USER:
<?php echo $_SESSION['nombre']; ?>
</h1>