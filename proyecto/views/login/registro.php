<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Registro Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/registro.css">
</head>
<body>
<?php include 'views/header.php'; ?>

<!-- Contenedor del formulario con el estilo unificado -->
<div class="formulario-registro">
    <h1>Crear nuevo usuario</h1>

    <form method="POST" action="index.php?controller=Usuario&action=crear" enctype="multipart/form-data" class="pista">
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

        <input type="number" name="peso" step="0.01" placeholder="Peso (kg)">
        <input type="number" name="altura" step="0.01" placeholder="Altura (m)">

        <select name="objetivo">
            <option value="perder peso">Perder Peso</option>
            <option value="ganar fuerza">Ganar Fuerza</option>
            <option value="estabilidad">Estabilidad</option>
        </select>

        <label class="tarjeta-subtitulo">Selecciona un entrenador:</label>
        <select name="entrenador_id">
            <?php foreach($entrenadores as $entrenador): ?>
                <option value="<?= $entrenador->id ?>">
                    <?= $entrenador->nombreEntrenador ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label class="tarjeta-subtitulo">Foto de perfil:</label>
        <input type="file" name="foto">

        <button type="submit" class="btn-apuntar">Crear Cuenta</button>
    </form>
</div>

<?php include 'views/footer.php'; ?>
</body>
</html>
