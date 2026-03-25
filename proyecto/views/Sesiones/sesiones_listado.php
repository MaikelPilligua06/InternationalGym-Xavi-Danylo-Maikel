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
<h2>Mis sesiones</h2>
<ul>
    <?php foreach($lista as $fila): ?>
        <li>
            <a href="index.php?controller=Sesiones&action=getId&id=<?= $fila->id ?>">
                <p><?= $fila->nombre ?></p>
            </a>
            <a href="index.php?controller=Sesiones&action=eliminarSesion&id=<?= $fila->id ?>">
                <button>Eliminar</button>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<h1>Sesiones Disponibles</h1>


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


