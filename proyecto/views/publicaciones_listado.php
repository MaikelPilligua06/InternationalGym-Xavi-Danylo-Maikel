<?php
    include 'header.php';
    ?>
<h1>Mis publicaciones</h1>

<?php if (isset($sesiones) && !empty($sesiones)): ?>
    <?php foreach ($sesiones as $publicacion): ?>
        <a href="">
            <h1><?= $sesiones->nombre ?></h1>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <p>No tienes publicaciones aún.</p>
<?php endif; ?>

<p>
    <a href="index.php?controller=Sesiones&action=ver">
        <button>Crear nueva publicación</button>
    </a>
    <button onclick="history.back()">Volver</button>
</p>
<?php
include 'footer.php';
?>