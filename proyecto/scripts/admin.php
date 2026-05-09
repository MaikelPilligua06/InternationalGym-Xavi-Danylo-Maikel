<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();
$passwordEntrenador = password_hash("admin", PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, rol, fechaDeAlta, foto) 
VALUES ('MXD', 'MXD', '34631772378', 'DNI', '52566487A', 'admin@institutmvm.cat', '$passwordEntrenador', 20, 'masculino', 70, 1.40, 'estabilidad', 'admin', '2026-02-27', 'default.jpeg')";
$db->exec($sql);
echo "Entrenador insertado correctamente.";
exit;
?>