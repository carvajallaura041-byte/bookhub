<?php

session_start();

include("../includes/conexion.php");

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios
        WHERE correo='$correo'";

$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) > 0){

    $usuario = mysqli_fetch_assoc($resultado);

    // VALIDAR PASSWORD
    if($password == $usuario['password']){

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // REDIRECCIONES
        if($usuario['rol'] == 'admin'){

            header("Location: ../admin/dashboard.php");

        }else{

            header("Location: ../user/dashboard.php");

        }

    }else{

        echo "Contraseña incorrecta";

    }

}else{

    echo "Usuario no encontrado";

}
?>