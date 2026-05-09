<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();
$sql = "INSERT INTO UsuarioEntrenador (id_usuario, id_entrenador)
VALUES (
  (SELECT id FROM Usuarios WHERE correoElectronico = 'mvp@institutmvm.cat'),
  (SELECT id FROM Usuarios WHERE correoElectronico = 'mmolina@institutmvm.cat')
)";
$db->exec($sql);
echo "Relación usuario-entrenador creada correctamente.";
exit;
?>