<?php
require_once '../config/conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['usuario_nombre'] = $user['nombre'];
        $_SESSION['tipo_usuario'] = $user['tipo_usuario']; // Guardar el tipo de usuario en la sesión
        echo "<h2 style='color:#000;' >Inicio de sesión exitoso. Bienvenido, " . $user['nombre'] . "</h2>";
        header("Location: ../usuario/index.php");
        if ($user['tipo_usuario'] === 'admin') {
            echo " (Administrador)";
        }
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No existe una cuenta con ese email.";
}

$stmt->close();
$conn->close();
?>