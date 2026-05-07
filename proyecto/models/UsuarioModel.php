<?php
require_once 'Usuario.php';
require_once 'db.php';
require_once 'Entrenador.php';

class UsuarioModel {
    public function getAll($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Usuarios WHERE id = :usuarioId ");
        $stmt->execute([':usuarioId' => $usuarioId]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuario = [];

        foreach ($resultado as $fila) {
            $usuario = new Usuario($fila);
        }

        return $usuario;
    }
    public function getEntrenadorUsuario($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT e. id, e.nombreEntrenador, e.apellido, e.correoElectronico, e.descripcion
            FROM Entrenadores e
            JOIN Usuarios u ON e.id = u.id_entrenador
            WHERE u.id = :usuarioId;
        ");
        $stmt->execute([":usuarioId" => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
<<<<<<< HEAD

    public function save($usuario){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, fechaDeAlta, foto, id_entrenador)");
        $stmt->execute();
=======
    public function save($nombreUsuario, $apellido, $numeroTelefono, $tipoDocumento, $numeroDocumento, $correoElectronico, $contrasenia, $edad, $genero, $peso, $altura, $objetivo,  $foto, $id_entrenador){
        $db = conectar();
        $hash = password_hash($contrasenia, PASSWORD_DEFAULT);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $base_dir = "/var/www/html/views/gymFotos/usuarios/";
            $ruta_nuevo_destino = $base_dir . basename($_FILES['foto']['name']);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_nuevo_destino)) {
                $fotoNombre = $_FILES['foto']['name'];
            }
        }

        $stmt = $db->prepare("
    INSERT INTO Usuarios 
    (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, foto, id_entrenador)
    VALUES
    (:nombreUsuario, :apellido, :numeroTelefono, :tipoDocumento, :numeroDocumento, :correoElectronico, :contrasenia, :edad, :genero, :peso, :altura, :objetivo, :foto, :id_entrenador)
");

        try {
            $stmt->execute([
                ':nombreUsuario' => $nombreUsuario,
                ':apellido' => $apellido,
                ':numeroTelefono' => $numeroTelefono,
                ':tipoDocumento' => $tipoDocumento,
                ':numeroDocumento' => $numeroDocumento,
                ':correoElectronico' => $correoElectronico,
                ':contrasenia' => $hash,
                ':edad' => $edad,
                ':genero' => $genero,
                ':peso' => $peso,
                ':altura' => $altura,
                ':objetivo' => $objetivo,
                ':foto' => $foto,
                ':id_entrenador' => $id_entrenador
            ]);
        } catch (PDOException $e) {
            die("Error al insertar usuario: " . $e->getMessage());
        }
>>>>>>> 5d2af1755716ccc4a82ebf2380e7034cb6bbe477
    }
    public function getEntrenadores(){
        $db = conectar();
        $stmt = $db->query("SELECT id, nombreEntrenador, apellido, correoElectronico, descripcion FROM Entrenadores");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach($resultado as $entrenador){
            $entrenadores[] = new Entrenador($entrenador);
        }
        return $entrenadores;
    }
}
