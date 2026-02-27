<?php
require_once "models/db.php";

$db = conectar();
$passwordAdmin = password_hash("entrenador", PASSWORD_DEFAULT);

$sql = "INSERT INTO Usuarios (nombre, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, disponibiladHora) 

VALUES ('manuel', 'molina', '+34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', '$passwordAdmin', 'tarde')";

$db->execute($sql);
echo "Usuario insertado correctamente.";
exit;
?>
