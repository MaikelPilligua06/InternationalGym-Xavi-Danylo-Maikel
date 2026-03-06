<?php
require_once "db.php";

class AuthModel {

    public function login($correo, $password) {
        // Login para usuario
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

        // Login para entrenador
        $stmt = $db->prepare("
SELECT id, correoElectronico, contrasenia
FROM Entrenadores
WHERE correoElectronico = :correo
");
        $stmt->execute([":correo" => $correo]);

        $entrenador = $stmt->fetch(PDO::FETCH_ASSOC);

        if($entrenador && password_verify($password, $entrenador["contrasenia"])){
            return $entrenador;
        }


        return false;
    }

}

