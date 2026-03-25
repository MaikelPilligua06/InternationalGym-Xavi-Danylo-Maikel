<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado Sesiones</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
<?php include 'views/header.php'; ?>
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


<div class="carrusel-movil">

        <div class="pista">
            <?php foreach ($sesiones as $sesion): ?>
             <div class="tarjeta-movil">
                 <h4><?= $sesion->tipoDeClases ?></h4>
                 <p><strong>Fecha:</strong> <?= $sesion->fechaClases ?></p>
                 <p><strong>Duracion:</strong> <?= $sesion->duracion ?></p>
                 <p><strong>Entrenador:</strong> <?= $sesion->id_entrenador ?></p>
                 <a href="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>">
                 <button>Apuntate</button>
                 </a>
             </div>
            <?php endforeach; ?>
        </div>

    </div>
<?php include 'views/footer.php'; ?>
</body>
</html>


