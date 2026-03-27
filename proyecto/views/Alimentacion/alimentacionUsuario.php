<?php
    include 'views/header.php';
    ?>
<div>
    <a href="index.php?controller=Alimentacion&action=crear_plato_form">
        <p>Crear nuevos platos</p>
    </a>
    <a href="">
        <p>Borrar platos</p>
    </a>
<div>
<h2>Lista de Alimentación</h2>
<p>Total de calorias obtenidas atraves de su lista de comida: <?php ?></p>
<div>
    <h3>Listado de tus platos: </h3>
    <ul>
        <?php foreach ($alimentacion as $plato): ?>
            <li>
                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id_Alimentacion ?>">
                    <p><?= $plato->nombre ?> </p>
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
        <?php foreach ($todosLosPlatos as $plato): ?>
            <a href="index.php?controller=Alimentacion&action=verPlato&id<?= $plato->id ?>">
                <p><?= $plato->nombrePlato?></p>
            </a>
            <a href="index.php?controller=Alimentacion&action=addPlatoUsuario&id=<?= $plato->id ?>">
                <button>Añadir</button>
            </a>
            <a href="index.php?controller=Alimentacion&action=editar<?= $plato->id ?>">
                <button>Editar</button>
            </a>
        <?php endforeach; ?>
    </ul>
</div>
    <?php
    include 'views/footer.php';
    ?>