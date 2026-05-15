<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Alimentacion</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/alimentacion.css">
</head>
<body>
<?php include 'views/header.php'; ?>

<div class="contenedor-alimentacion">

    <?php if ($_SESSION['rol'] === 'admin'): ?>
        <div class="enlaces-admin">
            <a href="index.php?controller=Alimentacion&action=crear_plato_form">Crear nuevos platos</a>
            <a href="index.php?controller=Alimentacion&action=getTodosLosPlatos">Borrar platos</a>
        </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['mensaje'])): ?>
        <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error_fatal'])): ?>
        <p class="error"><?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?></p>
    <?php endif; ?>

    <h2 class="titulo-alimentacion">Lista de Alimentación</h2>
    <p class="texto-alimentacion">Total de calorías obtenidas a través de su lista de comida:</p>

    <div class="bloque-alimentacion">
        <h3>Listado de tus platos:</h3>

        <?php if (!empty($alimentacion)) : ?>
                <ul class="lista-platos"><?php foreach ($alimentacion as $platoUsuario): ?>
                        <li class="plato-item">
                            <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $platoUsuario->id ?>">
                                <img class="foto-plato" src="views/gymFotos/alimentacion/<?= $platoUsuario->foto ?>"/>
                                <p>Nombre del plato: <?= $platoUsuario->nombrePlato; ?></p>
                                <p>Proteinas: <?= $platoUsuario->proteinas; ?></p>
                                <p>Calorias: <?= $platoUsuario->calorias; ?> kcal</p>
                            </a>
                            <a href="index.php?controller=Alimentacion&action=eliminarPlato&id=<?= $platoUsuario->id; ?>">
                                <button class="btn-eliminar" type="button">Eliminar</button>
                            </a>
                        </li>
                    <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <div class="sin-platos">No tienes ni un plato agregado.</div>
        <?php endif; ?>
    </div>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <div class="bloque-alimentacion">
        <h3>Lista de platos en general:</h3>
        <ul class="lista-platos">
            <?php foreach ($todosLosPlatos as $plato): ?>
                <li class="plato-item">
                    <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                        <img class="foto-plato" src="views/gymFotos/alimentacion/<?= $plato->foto ?>"/>
                        <p>Nombre del plato: <?= $plato->nombrePlato; ?></p>
                        <p>Proteinas: <?= $plato->proteinas; ?></p>
                        <p>Calorias: <?= $plato->calorias; ?> kcal</p>
                    </a>
                    <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $plato->id ?>">
                        <button class="btn-anadir" type="button">Añadir</button>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

<?php include 'views/footer.php'; ?>
</body>
</html>