<?php

class UsuarioBD
{
    private $conn;

    // Constructor que recibe la conexión como parámetro
    public function __construct($conexion)
    {
        $this->conn = $conexion; // Asigna la conexión a la variable de la clase
    }

    public function obtenerUsuarioPorId($usuarioId)
    {
        $query = "SELECT * FROM usuario WHERE id = ?";
        $usuario = null;

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $usuarioId);
            $stmt->execute();

            $resultado = $stmt->get_result();
            if ($row = $resultado->fetch_assoc()) {
                $usuario = $row;
            }
        } catch (Exception $exception) {
            echo "Error: " . $exception->getMessage();
        }

        return $usuario;
    }
}
?>