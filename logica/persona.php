<?php
require_once '../persistencia/usuarioBD.php';

class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $tipo_usuario;
    private $fecha_registro;

    // Constructor de la clase
    public function __construct($nombre, $email, $password, $tipo_usuario = 'normal')
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->tipo_usuario = $tipo_usuario;
    }

    // Métodos para establecer los valores
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setTipoUsuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;
    }

    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    // Métodos para obtener los valores
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
    }

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }









}

?>