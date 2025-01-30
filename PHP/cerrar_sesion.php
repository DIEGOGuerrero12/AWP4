

<?php
    session_start();
    session_unset();
    // Destruye la sesión
    session_destroy();
    // Redirige a index.php
    header("Location: index.php");
    exit();
?>