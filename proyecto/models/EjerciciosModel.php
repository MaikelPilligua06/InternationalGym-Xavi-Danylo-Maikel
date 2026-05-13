<?php
require_once "db.php";
require_once "Ejercicios.php";

class EjerciciosModel
{

    //Funcion para ver la información que contiene un ejercicio
    public function getAll()
    {
        try{
            $db = conectar();
            $stmt = $db->query("SELECT * FROM Ejercicios");
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicio = [];
            foreach ($resultado as $fila) {
                $ejercicio[] = new Ejercicios($fila);
            }
            return $ejercicio;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener los ejercicios");
        }
    }

    //Funcion para guardar un ejercicio en el perfil del usuario
    public function guardar($id, $usuario)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT COUNT(*) FROM Usuario_Ejercicio WHERE id_usuario = :usuario AND id_ejercicio = :id");
            $stmt->execute([':usuario' => $usuario, ':id' => $id]);

            if ($stmt->fetchColumn() > 0) {
                throw new Exception("Ya tienes este ejercicio añadido.");
            }

            $stmt = $db->prepare("INSERT INTO Usuario_Ejercicio (id_usuario, id_ejercicio) VALUES (:usuario, :id)");
            $stmt->execute([':usuario' => $usuario, ':id' => $id]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    //Función para ver la información de un ejercicio
    public function getById($id)
    {
        try{
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM Ejercicios WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$fila) {
                throw new Exception("Ejercicio no encontrado.");
            }

            return new Ejercicios($fila);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener el ejercicio");
        }
    }

    //
    public function informacionUsuario($usuario)
    {
        try{
            $db = conectar();
            $stmt = $db->prepare("
            SELECT ejercicio.*, usuario_ejercicio.id_usuario
            FROM Ejercicios ejercicio
            JOIN Usuario_Ejercicio usuario_ejercicio 
            ON ejercicio.id = usuario_ejercicio.id_ejercicio
            WHERE usuario_ejercicio.id_usuario = :id
        ");
            $stmt->execute([':id' => $usuario]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener los ejercicios");
        }
    }

    public function delete($id)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM Usuario_Ejercicio WHERE id_ejercicio = :id");
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al eliminar el ejercicio");
        }
    }

    public function borrarEjercicio($id)
    {
        try{
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM Usuario_Ejercicio WHERE id_ejercicio = :id");
            $stmt->execute([':id' => $id]);
            $stmt = $db->prepare("DELETE FROM Ejercicios WHERE id = :id");
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al eliminar el ejercicio");
        }
    }

    public function publicarEjercicio($ejercicio)
    {
        try {
            $base_dir    = "/var/www/html";
            $extensiones = ['image/jpg', 'image/jpeg', 'image/png'];
            $max_tamanyo = 1024 * 1024 * 8;

            if (!in_array($_FILES['foto']['type'], $extensiones)) {
                throw new Exception("Usa una imagen jpg, jpeg o png.");
            }
            if ($_FILES['foto']['size'] >= $max_tamanyo) {
                throw new Exception("El archivo es demasiado grande");
            }

            $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino  = $base_dir . "/views/gymFotos/ejercicios/" . $_FILES['foto']['name'];

            if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                throw new Exception("Error al subir la foto");
            }

            $db = conectar();
            $stmt = $db->prepare("
                    INSERT INTO Ejercicios (nombreEjercicio, descripcion, calorias, foto)
                    VALUES (:nombreEjercicio, :descripcion, :calorias, :foto)
                ");
            $stmt->execute([
                ':nombreEjercicio' => $ejercicio->nombreEjercicio,
                ':descripcion'     => $ejercicio->descripcion,
                ':calorias'        => $ejercicio->calorias,
                ':foto'            => $_FILES['foto']['name']
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al publicar el ejercicio");
        }
    }
        public function update($id, $ejercicio){
        try{
            $db = conectar();

            if (!empty($_FILES['foto']['name'])) {
                $extensiones = ['image/jpg', 'image/jpeg', 'image/png'];
                $max_tamanyo = 1024 * 1024 * 8;
                $base_dir    = "/var/www/html";

                if (!in_array($_FILES['foto']['type'], $extensiones)) {
                    throw new Exception("Usa una imagen jpg, jpeg o png.");
                }
                if ($_FILES['foto']['size'] >= $max_tamanyo) {
                    throw new Exception("La foto es demasiado grande");
                }

                $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
                $ruta_nuevo_destino  = $base_dir . "/views/gymFotos/ejercicios/" . $_FILES['foto']['name'];

                if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    throw new Exception("Error al subir la imagen.");
                }

                $ejercicio->foto = $_FILES['foto']['name'];
            }

            $stmt = $db->prepare("
                UPDATE Ejercicios SET nombreEjercicio = :nombreEjercicio, descripcion = :descripcion,
                calorias = :calorias, foto = :foto WHERE id = :id
            ");
            $stmt->execute([
                ':id'              => $id,
                ':nombreEjercicio' => $ejercicio->nombreEjercicio,
                ':descripcion'     => $ejercicio->descripcion,
                ':calorias'        => $ejercicio->calorias,
                ':foto'            => $ejercicio->foto
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al actualizar el ejercicio");
        }
    }

    public function estaApuntado($id, $usuarioId){
        try{
            $db = conectar();
            $stmt = $db->prepare("
            SELECT id_usuario, id_ejercicio FROM Usuario_Ejercicio 
            WHERE id_usuario = :id_usuario AND id_ejercicio = :id_ejercicio
        ");
            $stmt->execute([
                ':id_usuario'  => $usuarioId,
                ':id_ejercicio' => $id
            ]);
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al comprobar el ejercicio");
        }
    }
}