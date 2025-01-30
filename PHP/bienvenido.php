<?php
session_start();

// Verifica si la sesión es válida
if (!isset($_SESSION["valido"]) || $_SESSION["valido"] !== true) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "No tienes acceso. Por favor, inicia sesión."]);
    exit();
}

// Si la solicitud es para JSON (mediante el encabezado HTTP_ACCEPT)
if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
    header("Content-Type: application/json");

    // Devuelve datos en formato JSON
    echo json_encode([
        "mensaje" => "Bienvenido",
        "nombre" => $_SESSION["nombre"],
        "estado" => "sesión válida"
    ]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <?php
    // Renderiza HTML si no es una solicitud JSON
    if (isset($_SESSION["valido"]) && $_SESSION["valido"] === true) {
        echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION["nombre"]) . "!</h1>";
    }
    ?>
    <button onclick="window.location.href='cerrar.php';">Cerrar Sesión</button>
</body>
</html>
