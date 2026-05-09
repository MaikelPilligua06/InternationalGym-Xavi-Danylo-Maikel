<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();
$passwordEntrenador = password_hash("entrenador", PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, rol, descripcion, fechaDeAlta, foto) 
VALUES ('manuel', 'molina', '34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', '$passwordEntrenador', 20, 'masculino', 70, 1.40, 'estabilidad', 'entrenador', '¡Hola soy un Entrenador!', '2026-02-27', 'default.jpeg')";
$db->exec($sql);
echo "Entrenador insertado correctamente.";
exit;
?>