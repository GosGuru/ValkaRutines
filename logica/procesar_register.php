<?php
session_start();
require_once '../config/conexion.php'; // Ajusta la ruta según donde hayas colocado conexion.php

$nuevaURL = ('../usuario/index.php');

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$tipo_usuario = 'normal'; // El tipo de usuario por defecto es 'normal'

// Preparar la declaración SQL
$sql = "INSERT INTO usuario (nombre, email, password, tipo_usuario) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la declaración: " . $conn->error);
}

// Vincular parámetros
$stmt->bind_param("ssss", $nombre, $email, $password, $tipo_usuario);

// Ejecutar la declaración
if ($stmt->execute()) {
    $last_id = mysqli_insert_id($conn); // Obtener el ID del usuario insertado

    echo "<script>alert('Registro Exitoso');</script>";

    // Puedes hacer algo con el $last_id aquí, como almacenarlo en una variable de sesión
    $_SESSION['use_id'] = $last_id;

    header('Location: ' . $nuevaURL);
    exit();
} else {
    echo "Error en el registro: " . $stmt->error;
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>