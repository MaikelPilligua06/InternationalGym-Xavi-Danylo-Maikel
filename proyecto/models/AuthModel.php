<?php
require_once "db.php";

class AuthModel {

    public function login($usuario, $password) {
        $db = conectar();

        $stmt = $db->prepare("SELECT id, usuario, password FROM Usuarios WHERE usuario = :usuario");
        $stmt->execute([':usuario' => $usuario]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
?>
