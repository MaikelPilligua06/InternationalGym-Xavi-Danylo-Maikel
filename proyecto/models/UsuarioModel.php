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
    public function save($nombreUsuario, $apellido, $numeroTelefono, $tipoDocumento, $numeroDocumento, $correoElectronico, $contrasenia, $edad, $genero, $peso, $altura, $objetivo, $fechaDeAlta, $foto, $id_entrenador){
        $db = conectar();
        $hash = password_hash($contrasenia, PASSWORD_DEFAULT);

        $stmt = $db->prepare("
            INSERT INTO Usuarios 
            (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, 
            objetivo, fechaDeAlta, foto, id_entrenador) VALUES (:nombreUsuario, :apellido, :numeroTelefono, :tipoDocumento, :numeroDocumento, :correoElectronico, :contrasenia, :edad, :genero, :peso, :altura, :objetivo, :fechaDeAlta, :foto, :id_entrenador)");

        $base_dir = "/var/www/html";
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        $max_tamanyo = 1024 * 1024 * 8;
        $ruta_indexphp = dirname(realpath(__FILE__));
        $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
        $ruta_nuevo_destino = $base_dir . "/views/gymFotos/usuario/" . $_FILES['foto']['name'];
        if (in_array($_FILES['foto']['type'], $extensiones)) {
            if ($_FILES['foto']['size'] < $max_tamanyo) {
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    $foto = $_FILES['foto']['name'];
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
                        ':fechaDeAlta' => $fechaDeAlta,
                        ':foto' => $foto,
                        ':id_entrenador' => $id_entrenador

        ]);
                }
            } else{

            }
        }
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
