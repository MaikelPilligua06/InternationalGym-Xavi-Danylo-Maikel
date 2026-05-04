<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Login</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<h1>Login</h1>

<?php if (!empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<div>
    <form method="POST" action="index.php?controller=Auth&action=loginProcess">
        <input type="text" name="correo" placeholder="Correo electrónico">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Entrar</button>
    </form>
    <a href="index.php?controller=Usuario&action=registro">
        <button>Crear Usuario</button>
    </a>
</div>
<?php


include 'views/footer.php';
?>
</body>
</html>
