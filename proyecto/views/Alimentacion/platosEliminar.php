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
