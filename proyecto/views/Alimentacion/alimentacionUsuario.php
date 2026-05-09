<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Alimentacion</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'views/header.php';
    ?>
<?php if ($_SESSION['rol'] === 'admin'): ?>
    <div>
        <a href="index.php?controller=Alimentacion&action=crear_plato_form">
            <p>Crear nuevos platos</p>
        </a>
        <a href="index.php?controller=Alimentacion&action=getTodosLosPlatos">
            <p>Borrar platos</p>
        </a>
    <div>
        <?php endif; ?>
        <h2>Lista de Alimentación</h2>
<p>Total de calorias obtenidas atraves de su lista de comida:</p>
<div>
    <h3>Listado de tus platos: </h3>
    <?php if (!empty($alimentacion)) : ?>
        <ul>
            <?php foreach ($alimentacion as $platoUsuario): ?>
            <li>
                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $platoUsuario->id ?>">
                    <p>Nombre del plato: <?php echo $platoUsuario->nombrePlato ;?></p>
                    <p>Proteinas: <?php echo $platoUsuario->proteinas;?></p>
                    <p>Calorias: <?php echo $platoUsuario->calorias;?> kcal</p>
                </a>
                <a href="index.php?controller=Alimentacion&action=eliminarPlato&id=<?= $platoUsuario->id; ?>">
                    <button>Eliminar</button>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No tienes ni un plato agregado.</p>
    <?php endif; ?>
</div>
<div>
    <h3>Lista de platos en general: </h3>
    <ul>
        <?php foreach ($todosLosPlatos as $plato): ?>
            <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                <p>Nombre del plato: <?= $plato->nombrePlato?></p>
                <p>Proteinas:: <?= $plato->proteinas?></p>
                <p>Calorias: <?= $plato->calorias?> kcal</p>
            </a>
            <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $plato->id ?>">
                <button>Añadir</button>
            </a>
        <?php endforeach; ?>
    </ul>
</div>
    <?php
    include 'views/footer.php';
    ?>
</body>
</html>
