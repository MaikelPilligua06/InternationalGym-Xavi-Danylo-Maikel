<?php
    include 'views/header.php';
    ?>

    <h1>Detalles de la Sesion - <?= $sesion->nombreClase?></h1>
    <h3>Tipo de clase: <?= $sesion->tipoDeClases?></h3>
    <h3>Fecha de la clase: <?= $sesion->fechaClases?></h3>
    <h3>Duración: <?= $sesion->duracion?></h3>
    <h3>Descripción: <?= $sesion->descripcion?></h3>
    <img src="views/gymFotos/sesiones/<?= $sesion->foto?>"/>

<form action="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>" method="POST">
    <button onclick="history.back()">Volver</button>
    <button>Apuntarme</button>
</form>


<?php
    include 'views/footer.php';
    ?>


