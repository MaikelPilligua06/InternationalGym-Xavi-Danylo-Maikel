<h1>Mis publicaciones</h1>

<?php if (isset($_SESSION['publicaciones']) && !empty($_SESSION['publicaciones'])): ?>
    <?php foreach ($_SESSION['publicaciones'] as $publicacion): ?>
        <div style="border: 1px solid #ccc; margin: 10px; padding: 15px;">
            <?php if ($publicacion['foto']): ?>
                <img src="gymFotos/<?= htmlspecialchars($publicacion['foto']) ?>"
                     alt="Publicación" style="max-width: 200px;">
            <?php endif; ?>
            <p><?= htmlspecialchars($publicacion['texto']) ?></p>
            <small><?= $publicacion['fecha'] ?></small>
        </div>
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
