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

    <form method="POST" action="index.php?controller=Auth&action=loginProcess">
        <input type="email" name="correoElectronico" placeholder="Correo electrónico">
        <input type="password" name="contrasenia" placeholder="Contraseña">
        <button type="submit">Entrar</button>
    </form>




<?php
<<<<<<< HEAD:proyecto/views/login/login.php


include 'views/footer.php';
?>
</body>
</html>
=======
include 'footer.php';
?>
>>>>>>> 40479de8991d3be5a55e23802afbbcef13dac02b:proyecto/views/login.php
