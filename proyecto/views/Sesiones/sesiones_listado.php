<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Listado de sesiones</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/styles.css">

</head>
<body>
<?php include 'views/header.php'; ?>
<div class="Publicaciones">
    <h1>Lista de Publicaciones</h1>
    <a href="index.php?controller=Sesiones&action=ver">
        <img src="/views/gymFotos/GYM-sesion.jpg"/>
    </a>
    <a href="index.php?controller=Sesiones&action=misPublicaciones">
        <p>Ver mis publicaciones</p>
    </a>
</div>
<h1>Mis sesiones</h1>

<div class="carrusel-movil">

    <div class="pista">
    <?php foreach($lista as $fila): ?>
        <div class="sg">
            <a href="index.php?controller=Sesiones&action=getId&id=<?= $fila->id ?>">
                <p>Nombre de la clase: <?= $fila->nombreClase ?></p>
                <p>Tipo de la clase: <?= $fila->tipoDeClases ?></p>
                <p><?= $fila->duracion ?></p>
                <p><?= $fila->fechaClases ?></p>

            </a>
            <a href="index.php?controller=Sesiones&action=eliminarSesion&id=<?= $fila->id ?>">
                <button>Eliminar</button>
            </a>
</div>
</div>
    <?php endforeach; ?>
</div>
<h1>Sesiones Disponibles</h1>


<div class="carrusel-movil">

        <div class="pista">

            <?php foreach ($sesiones as $sesion): ?>
            <div class="tarjeta-movil">
                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                    <h4>Nombre de la clase: <?= $sesion->nombreClase ?></h4>
                    <h4>TIpo de clases: <?= $sesion->tipoDeClases ?></h4>
                        <p><strong>Fecha:</strong> <?= $sesion->fechaClases ?></p>
                         p><strong>Duracion:</strong> <?= $sesion->duracion ?></p>
                        <p><strong>Entrenador:</strong> <?= $sesion->nombreEntrenador ?></p>
                        <p><strong>Calorias: </strong> <?= $sesion->calorias?></p>
                </a>
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


