<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<div class="login-container">

    <form action="validar_login.php" method="POST">

        <h2>BOOKHUB</h2>

        <input type="email"
               name="correo"
               placeholder="Correo"
               required>

        <input type="password"
               name="password"
               placeholder="Contraseña"
               required>

        <button type="submit">
            Iniciar Sesión
        </button>

    </form>

</div>

</body>
</html>