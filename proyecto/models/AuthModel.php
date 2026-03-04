<?php
require_once "db.php";

class AuthModel {

    public function login($correo, $password) {
        $db = conectar();
        $stmt = $db->prepare("
SELECT id, correoElectronico, contrasenia
FROM Usuarios
WHERE correoElectronico = :correo
");
        $stmt->execute([':correo' => $correo]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['contrasenia'])) {
            return $user;
        }

        return false;
    }

}

