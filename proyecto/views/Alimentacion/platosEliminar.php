<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Eliminar Plato</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/eliminarPlato.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<?php if (!empty($_SESSION['mensaje'])): ?>
    <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>
<div>
    <?php foreach ($todoslosPlatos as $plato): ?>
        <div>
            <h1> <?= $plato->nombrePlato?></h1>
            <h3> <?= $plato->descripcion?></h3>
            <h3> Proteínas: <?= $plato->proteinas?>g</h3>
            <h3> Carbohidratos: <?= $plato->carbohidratos?>g</h3>
            <h3> Grasas: <?= $plato->grasas?>g</h3>
            <a href="index.php?controller=Alimentacion&action=borrarPlato&id=<?= $plato->id ?>">
                <button>Borrar Plato</button>
            </a>
        </div>
    <?php endforeach;?>
</div>
<?php
include 'views/footer.php';
?>
</body>
</html>
