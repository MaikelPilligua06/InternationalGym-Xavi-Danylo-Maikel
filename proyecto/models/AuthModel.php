<?php

require_once __DIR__ . "/db.php";

class AuthModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function login($correo, $password)
    {
        $correo = trim($correo);
        $password = trim($password);

        $stmt = $this->db->prepare("
            SELECT *, 'usuario' AS tipo
            FROM Usuarios
            WHERE TRIM(correoElectronico) = ?
        ");
        $stmt->execute([$correo]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['contrasenia'])) {
            return $user;
        }

        $stmt = $this->db->prepare("
            SELECT *, 'entrenador' AS tipo
            FROM Entrenadores
            WHERE TRIM(correoElectronico) = ?
        ");
        $stmt->execute([$correo]);
        $trainer = $stmt->fetch();

        if ($trainer && password_verify($password, $trainer['contrasenia'])) {
            return $trainer;
        }

        return false;
    }
}
