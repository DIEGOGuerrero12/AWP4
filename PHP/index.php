
<?php
session_start();
// Credenciales predefinidas
$_SESSION["user"] = "Dejah";
$_SESSION["pass"] = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['user'] === $_SESSION["user"] && $_POST['pass'] === $_SESSION["pass"]) {
        $_SESSION["valido"] = true;
        $_SESSION["status"] = "activo";
        $_SESSION["nombre"] = "Dejah Thoris";
        header("Location: bienvenido.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <form method="post" action="">
        <label for="user">Usuario:</label>
        <input type="text" name="user" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" required>
        <br><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

<?php
session_start();
