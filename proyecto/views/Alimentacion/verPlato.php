<?php
include 'views/header.php';
?>

<div>
    <h1><?= $alimentacion->nombrePlato?></h1>
    <h3>Descripción: <?= $alimentacion->descripcion ?> </h3>
    <h3>Calorias: <?= $alimentacion->calorias ?> </h3>
    <h3>Proteinas: <?= $alimentacion->proteinas ?> </h3>
    <h3>Carbohidratos: <?= $alimentacion->carbohidratos ?> </h3>
    <h3>Grasas: <?= $alimentacion->grasas ?> </h3>
    <div>
        <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $alimentacion->id ?>">
            <button>Agregar plato</button>
        </a>
        <a href="index.php?controller=Alimentacion&action=index">
            <button>Volver</button>
        </a>
    </div>
</div>
<?php
include 'views/footer.php';
?>
