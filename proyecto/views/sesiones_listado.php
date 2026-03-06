<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado Sesiones</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="Publicaciones">
    <h2>Lista de Publicaciones</h2>
    <a href="index.php?controller=Sesiones&action=ver">
        <img src="" alt="Crear Publicacion"/>
    </a>
    <a href="index.php?controller=Sesiones&action=misPublicaciones">
        <p>Ver mis publicaciones</p>
    </a>
</div>

<h1>Sesiones</h1>


<?php foreach($sesiones as $sesion): ?>
<ul>
    <li>
        <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
            <?= $sesion->nombre ?> - <?= $sesion->tipoDeClases ?> - <?= $sesion->fechaClases ?>
        </a>
    </li>
</ul>


<?php endforeach; ?>

<?php include 'footer.php'; ?>
</body>
</html>


