<?php
include 'views/header.php';
?>

<div>
    <h1><?= $alimentacion->nombrePlato?></h1>
    <h3>Objetivo: <?= $alimentacion->objetivo ?> </h3>
    <h3>Calorias: <?= $alimentacion->calorias ?> </h3>
    <h3>Proteinas: <?= $alimentacion->proteinas ?> </h3>
    <h3>Carbohidratos: <?= $alimentacion->carbohidratos ?> </h3>
    <h3>Grasas: <?= $alimentacion->grasas ?> </h3>
    <h3>Descripción: <?= $alimentacion->descripcion ?> </h3>
    <img src="views/gymFotos/alimentacion/<?= $alimentacion->foto?>"/>
    <div>
        <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $alimentacion->id ?>">
            <button>Agregar plato</button>
        </a>
        <button onclick="history.back()">Volver</button>
    </div>
</div>
<?php
include 'views/footer.php';
?>
