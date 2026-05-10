<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();
$passwordUsuario = password_hash("mvp", PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, rol, fechaDeAlta, foto) 
VALUES ('usuario', 'instiut', '+34 6310042233', 'DNI', '48042187A', 'mvp@institutmvm.cat', '$passwordUsuario', 20, 'masculino', 70, 1.40, 'estabilidad', 'usuario', '2026-02-27', 'default.jpeg')";
$db->exec($sql);
echo "Usuario insertado correctamente.";
$sql = "INSERT INTO UsuarioEntrenador (id_usuario, id_entrenador)
VALUES (
  (SELECT id FROM Usuarios WHERE correoElectronico = 'mvp@institutmvm.cat'),
  (SELECT id FROM Usuarios WHERE correoElectronico = 'mmolina@institutmvm.cat')
)";
$db->exec($sql);
exit;
?>