<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Registro Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'views/header.php';
?>

<form method="POST" action="index.php?controller=Usuario&action=crear">
    <input type="text" name="nombreUsuario" placeholder="Nombre">
    <input type="text" name="apellido" placeholder="Apellido">
    <input type="tel" name="numeroTelefono" placeholder="Numero de telefono">
    <select name="tipoDocumento">
        <option value="Pasaporte">Pasaporte</option>
        <option value="DNI">DNI</option>
        <option value="NIE">NIE</option>
    </select>
    <input type="text" name="numeroDocumento" placeholder="Numero de Documento">
    <input type="text" name="correoElectronico" placeholder="Correo electronico">
    <input type="password" name="contrasenia" placeholder="Contraseña">
    <input type="number" name="edad" placeholder="Edad">
    <select name="genero">
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
    </select>
    <input type="number" name="peso" step="0.01" placeholder="Peso">
    <input type="number" name="altura" step="0.01" placeholder="Altura">
    <select name="objetivo">
        <option value="perder peso">Perder Peso</option>
        <option value="ganar fuerza">Ganar Fuerza</option>
        <option value="estabilidad">Estabilidad</option>
    </select>
    <input type="file" name="foto" placeholder="Foto">
    <input type="number" name="edad" placeholder="Edad">

    <button type="submit">Entrar</button>
</form>
<h1><?= $entrenadores->nombreEntrenador?></h1>
<?php
include 'views/footer.php';
?>
</body>
</html>