<?php
session_start();
require_once "UsuarioController.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

$controller = new UsuarioController();
$usuario = $controller->obtenerUsuario($_SESSION["id_usuario"]);
?>

<!DOCTYPE html>
<html lang="es"
      <head>
          <meta charset="UTF-8">
          <title>Mi Perfil</title>
      </head>
<body>

<h2>Mi Perfil</h2>

<form action="controllers/UsuarioController.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">

    <label>Nombre:</label><br>
    <input type="text" value="<?php echo $usuario["nombre"]; ?>" disabled><br><br>

    <label>Apellido:</label><br>
    <input type="text" value="<?php echo $usuario["apellido"]; ?>" disabled><br><br>

    <label>Telefono:</label><br>
    <input type="text" name="numeroTelefono" value="<?php echo $usuario["numeroTelefono"]; ?>"><br><br>

    <label>Correo Electronico:</label><br>
    <input type="text" name="correoElectronico" value="<?php echo $usuario["correoElectronico"]; ?>"><br><br>

    <label>Objetivo:</label><br>
    <input type="text"><?php echo $usuario["objetivo"]; ?><br><br>

    <button type="submit" name="actualizar">Actualizar</button>
</form>
</body>
</html>