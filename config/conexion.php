<?php
$servername = "localhost";  // Cambia si tu servidor no es local
$username = "root";          // Cambia al nombre de usuario de tu base de datos
$password = "1234";          // Cambia a la contraseña de tu base de datos
$dbname = "Valka";

// Crear el Data Source Name (DSN)
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";

// Crear la conexión con mysqli (puedes eliminar esto si solo usarás PDO)
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión de mysqli
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

try {
    // Usar las variables correctas aquí
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexión fallida: ' . $e->getMessage();
}
?>