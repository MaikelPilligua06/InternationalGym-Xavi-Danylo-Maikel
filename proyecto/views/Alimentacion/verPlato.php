<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Plato <?= $alimentacion->nombrePlato?></title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/platos.css">
</head>
<body>
<?php
include 'views/header.php';
?>

<div class="contenedor-plato">
    <h1><?= $alimentacion->nombrePlato?></h1>
    <h3>Objetivo: <?= $alimentacion->objetivo ?> </h3>
    <h3>Calorias: <?= $alimentacion->calorias ?> </h3>
    <h3>Proteinas: <?= $alimentacion->proteinas ?> </h3>
    <h3>Carbohidratos: <?= $alimentacion->carbohidratos ?> </h3>
    <h3>Grasas: <?= $alimentacion->grasas ?> </h3>
    <h3>Descripción: <?= $alimentacion->descripcion ?> </h3>
    <img src="views/gymFotos/alimentacion/<?= $alimentacion->foto?>"/>
    <div class="botones-plato">
        <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $alimentacion->id ?>">
            <button class="btn-agregar">Agregar plato</button>
        </a>
        <button class="btn-volver" onclick="history.back()">Volver</button>
    </div>
</div>
</body>
</html>
