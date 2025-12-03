<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: permisos.php");
    exit();
}


$nombre_usuario = htmlspecialchars($_SESSION['usuario']);


$hora_actual = date("H:i:s");
$fecha_actual = date("d/m/Y");


$mensaje_bienvenida = "Tu acceso se ha registrado correctamente.";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="contenedor">
        <h1>¡Bienvenido!</h1>
        
        <div class="tarjeta bienvenida">

            <h2>Hola, <?php echo $nombre_usuario; ?></h2>
            

            <p class="mensaje"><?php echo $mensaje_bienvenida; ?></p>
            
            <hr>


            <p><strong>Fecha Actual:</strong> <?php echo $fecha_actual; ?></p>
            <p><strong>Hora de Acceso:</strong> <?php echo $hora_actual; ?></p>
            
            <?php 

            if (isset($_SESSION['inicio_sesion'])) {
                $tiempo_inicio = date("H:i:s d/m/Y", $_SESSION['inicio_sesion']);
                echo "<p><small>Sesión iniciada a las: $tiempo_inicio</small></p>";
            }
            ?>
        </div>

        <p class="logout-link">
            <a href="logout.php" class="boton-peligro">Cerrar Sesión</a>
        </p>
    </div>
</body>
</html>