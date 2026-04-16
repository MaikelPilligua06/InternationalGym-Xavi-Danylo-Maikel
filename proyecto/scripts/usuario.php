<?php
require_once "../models/db.php";

$db = conectar();
$passwordAdmin = password_hash("mvp", PASSWORD_DEFAULT);

$sql = "INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, fechaDeAlta, id_entrenador) 
VALUES ('usuario', 'instiut', '+34 6310042233', 'DNI', '48042187A', 'mvp@institutmvm.cat', '$passwordAdmin', 20, 'Masculino', 70, 1.40, 'estabilidad', '2026-02-27', 1)";
$db->exec($sql);
echo "Usuario insertado correctamente.";
exit;
?>
