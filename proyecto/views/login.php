<?php
include 'header.php';
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
include 'footer.php';
?>
