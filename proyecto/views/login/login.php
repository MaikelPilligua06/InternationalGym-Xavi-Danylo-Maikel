<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Login</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="views/LOGIN.css">
</head>
<body>
<?php
include 'views/header.php';
?>

<main class="pagina">
    <div class="contenedor-auth">
        <h1>Login</h1>

        <!-- Bloque de errores adaptado -->
        <?php if (!empty($error)): ?>
            <p class="alerta-error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <!-- Formulario con clases e inputs estilizados -->
        <form method="POST" action="index.php?controller=Auth&action=loginProcess" class="formulario-auth">
            <input type="text" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn-auth-entrar">Entrar</button>
        </form>

        <div class="separador-auth">o</div>

        <!-- Enlace de registro estructurado -->
        <a href="index.php?controller=Usuario&action=registro" style="text-decoration: none; display: block;">
            <button class="btn-auth-registro">Crear Usuario</button>
        </a>
    </div>
</main>

<?php
include 'views/footer.php';
?>
</body>
</html>
