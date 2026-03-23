<?php
    include 'header.php<';
    ?>
<h2>Lista de Alimentación</h2>
<p>Total de calorias obtenidas atraves de su lista de comida: <?php ?></p>
<div>
    <h3>Listado de tus platos: </h3>
    <ul>
        <?php foreach ($platos as $plato): ?>
            <li>
                <a href="index.php?controller=Alimentacion&action=verPlato&id<?= $plato->id_Alimentacion ?>">
                    <p><?= $plato->nombre?> </p>
                </a>
                <a href="index.php?controller=Alimentacion&action=eliminarPlato&id<?= $plato->id_Alimentacion ?>">
                    <button>Eliminar</button>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div>
    <h3>Lista de platos en general: </h3>

    <ul>
        <?php foreach ($todosPlatos as $plato): ?>
            <a href="index.php?controller=Alimentacion&action=verPlato&id<?= $plato->id_Alimentacion ?>">
                <p><?= $plato->nombre?></p>
            </a>
            <a href="index.php?controller=Alimentacion&action=addPlato<?= $plato->id_Alimentacion ?>">
                <button>Añadir</button>
            </a>
        <?php endforeach; ?>
    </ul>
</div>
    <?php
    include 'footer.php';
    ?>
