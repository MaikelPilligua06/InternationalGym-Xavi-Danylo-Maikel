<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Eliminar Plato</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'views/header.php';
?>
<div>
    <?php foreach ($todoslosPlatos as $plato): ?>
        <div>
            <h1> <?= $plato->nombrePlato?></h1>
            <h3> <?= $plato->descripcion?></h3>
            <h3> <?= $plato->proteinas?></h3>
            <h3> <?= $plato->carbohidratos?></h3>
            <h3> <?= $plato->grasas?></h3>
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