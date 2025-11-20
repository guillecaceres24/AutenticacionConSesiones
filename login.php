<?php

session_start();


$usuarios = [
    "admin" => "1234",
    "usuario" => "abcd",
    "guillermo" => "alumno"
];

$error_mensaje = "";


if (isset($_SESSION['usuario'])) {

    header("Location: bienvenida.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';


    if (array_key_exists($username, $usuarios) && $usuarios[$username] === $password) {
     
        $_SESSION['usuario'] = $username;
        $_SESSION['inicio_sesion'] = time();

        header("Location: bienvenida.php");
        exit();
    } else {

        $error_mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor">
        <h1>Servicio de Autenticación con Sesiones</h1>
        <h2>Iniciar Sesión</h2>
        
        <?php if ($error_mensaje): ?>
            <p class="error"><?php echo htmlspecialchars($error_mensaje); ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>

        <div class="info-usuarios">
            <h3>Usuarios de Prueba:</h3>
            <ul>
                <li>admin / 1234</li>
                <li>usuario / abcd</li>
            </ul>
        </div>
    </div>
</body>
</html>