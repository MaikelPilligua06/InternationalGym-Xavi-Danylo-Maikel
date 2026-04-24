<?php
require_once "db.php";
require_once "Ejercicios.php";

class EjerciciosModel
{

    //Funcion para ver la información que contiene un ejercicio
    public function getAll()
    {
        $db = conectar();
        $stmt = $db->query("SELECT * FROM Ejercicios");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ejercicio = [];
        foreach ($resultado as $fila) {
            $ejercicio[] = new Ejercicios($fila);
        }
        return $ejercicio;
    }

    //Funcion para guardar un ejercicio en el perfil del usuario
    public function guardar($id, $usuario)
    {
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Ejercicio (id_usuario, id_ejercicio) VALUES (:usuario, :id)");
        $stmt->execute([
            ':usuario' => $usuario,
            ':id' => $id
        ]);
    }

    //Función para ver la información de un ejercicio
    public function getById($id)
    {
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Ejercicios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Ejercicios($fila);
    }

    //
    public function informacionUsuario($usuario)
    {
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
    }

    public function delete($id)
    {
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Ejercicio WHERE id_ejercicio = :id");
        $stmt->execute([':id' => $id]);
    }

    public function borrarEjercicio($id)
    {
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Ejercicio WHERE id_ejercicio = :id");
        $stmt->execute([':id' => $id]);
        $stmt = $db->prepare("DELETE FROM Ejercicios WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function publicarEjercicio($ejercicio)
    {
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Ejercicios (nombreEjercicio, descripcion, calorias, foto) 
                      VALUES(:nombreEjercicio, :descripcion, :calorias, :foto)");
        $base_dir = "/var/www/html";
        $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
        $max_tamanyo = 1024 * 1024 * 8;
        $ruta_indexphp = dirname(realpath(__FILE__));
        $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
        $ruta_nuevo_destino = $base_dir . "/views/gymFotos/ejercicios/" . $_FILES['foto']['name'];
        if (in_array($_FILES['foto']['type'], $extensiones)) {
            if ($_FILES['foto']['size'] < $max_tamanyo) {
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    $stmt->execute([
                        ':nombreEjercicio' => $ejercicio->nombreEjercicio,
                        ':descripcion' => $ejercicio->descripcion,
                        ':calorias' => $ejercicio->calorias,
                        ':foto' => $_FILES['foto']['name'],
                    ]);
                    return "Ejercicio creado correctamente";
                }
            } else {
                return "Error: el archivo es demasiado grande.";
            }
        } else {
            return "Error: Formato de archivo no permitido.";
        }
    }

}