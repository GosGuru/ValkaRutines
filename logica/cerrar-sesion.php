<?php
// Inicia la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destruye la sesión actual
session_destroy();

// Redirecciona a la página de inicio o a otra página
header("Location: ../index.php");
exit;



?>