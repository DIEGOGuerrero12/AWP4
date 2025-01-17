<?php
session_start();

// Verificar si la sesión es válida
if (isset($_SESSION["valido"]) && $_SESSION["valido"] === true) {
    $usuario = $_SESSION["user"];
} else {
    // Redirigir al inicio de sesión si no está autenticado
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h1>
        <p>Has iniciado sesión correctamente.</p>
        <a href="cerrar_sesion.php" class="btn">Cerrar sesión</a>
    </div>
</body>
</html>
