<?php
session_start();

// Configuración inicial de sesión
if (!isset($_SESSION["user"]) || !isset($_SESSION["pass"])) {
    $_SESSION["user"] = "Dejah";
    $_SESSION["pass"] = "1234";
}

$error = ""; // Para almacenar mensajes de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar entradas
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);

    if ($user === $_SESSION["user"] && $pass === $_SESSION["pass"]) {
        $_SESSION["valido"] = true;
        header("Location: bienvenido.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS externo -->
</head>
<body>
    <div class="login-container">
        <h1>Inicio de Sesión</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" value="<?php echo isset($user) ? htmlspecialchars($user) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
        <?php if (!empty($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</body>
</html>
