<?php
require_once 'Usuario.php';
require_once 'db.php';
require_once 'Entrenador.php';

class UsuarioModel
{
    public function getAll($usuarioId)
    {
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

    public function getEntrenadorUsuario($usuarioId)
    {
        $db = conectar();
        $stmt = $db->prepare("
            SELECT e.id, e.nombreUsuario, e.apellido, e.correoElectronico, e.descripcion
            FROM Usuarios e
            JOIN UsuarioEntrenador ue ON e.id = ue.id_entrenador
            WHERE ue.id_usuario = :usuarioId
        ");
        $stmt->execute([":usuarioId" => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save($nombreUsuario, $apellido, $numeroTelefono, $tipoDocumento, $numeroDocumento, $correoElectronico, $contrasenia, $edad, $genero, $peso, $altura, $objetivo, $foto, $id_entrenador)
    {
        $db = conectar();
        $hash = password_hash($contrasenia, PASSWORD_DEFAULT);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $base_dir = "/var/www/html/views/gymFotos/usuarios/";
            $ruta_nuevo_destino = $base_dir . basename($_FILES['foto']['name']);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_nuevo_destino)) {
                $foto = $_FILES['foto']['name'];
            }
        }

        try {
            $db->beginTransaction();

            $stmt = $db->prepare("
                INSERT INTO Usuarios 
                (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, rol, foto)
                VALUES
                (:nombreUsuario, :apellido, :numeroTelefono, :tipoDocumento, :numeroDocumento, :correoElectronico, :contrasenia, :edad, :genero, :peso, :altura, :objetivo, 'usuario', :foto)
            ");

            $stmt->execute([
                ':nombreUsuario'    => $nombreUsuario,
                ':apellido'         => $apellido,
                ':numeroTelefono'   => $numeroTelefono,
                ':tipoDocumento'    => $tipoDocumento,
                ':numeroDocumento'  => $numeroDocumento,
                ':correoElectronico'=> $correoElectronico,
                ':contrasenia'      => $hash,
                ':edad'             => $edad,
                ':genero'           => $genero,
                ':peso'             => $peso,
                ':altura'           => $altura,
                ':objetivo'         => $objetivo,
                ':foto'             => $foto
            ]);

            $id_usuario_nuevo = $db->lastInsertId();

            if (!empty($id_entrenador)) {
                $stmtEntrenador = $db->prepare("
                    INSERT INTO UsuarioEntrenador (id_usuario, id_entrenador) 
                    VALUES (:id_usuario, :id_entrenador)
                ");
                $stmtEntrenador->execute([
                    ':id_usuario'    => $id_usuario_nuevo,
                    ':id_entrenador' => $id_entrenador
                ]);
            }

            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die("Error al insertar usuario: " . $e->getMessage());
        }
    }

    public function getEntrenadores()
    {
        $db = conectar();
        $stmt = $db->query("SELECT id, nombreUsuario, apellido, correoElectronico, descripcion FROM Usuarios WHERE rol = 'entrenador'");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach ($resultado as $entrenador) {
            $entrenadorMapeado = [
                'id' => $entrenador['id'],
                'nombreEntrenador' => $entrenador['nombreUsuario'],
                'apellido' => $entrenador['apellido'],
                'correoElectronico' => $entrenador['correoElectronico'],
                'descripcion' => $entrenador['descripcion']
            ];
            $entrenadores[] = new Entrenador($entrenadorMapeado);
        }
        return $entrenadores;
    }

    public function actualizar($numeroTelefono, $correoElectronico, $objetivo, $nivelActividad)
    {
        $db = conectar();
        $usuarioId = $_SESSION['id'];

        $nivelesValidos = ['sedentario', 'moderado', 'activo'];
        if (!in_array($nivelActividad, $nivelesValidos)) {
            $nivelActividad = null;
        }

        $stmt = $db->prepare("
            UPDATE Usuarios 
            SET numeroTelefono = :numeroTelefono,
                correoElectronico = :correoElectronico,
                objetivo = :objetivo,
                nivelActividad = :nivelActividad
            WHERE id = :id
        ");

        $stmt->execute([
            ':numeroTelefono'    => $numeroTelefono,
            ':correoElectronico' => $correoElectronico,
            ':objetivo'          => $objetivo,
            ':nivelActividad'    => $nivelActividad,
            ':id'                => $usuarioId
        ]);
    }
}
