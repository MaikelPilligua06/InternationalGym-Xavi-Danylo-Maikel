<?php
    include 'views/header.php';
    ?>
<img src="views/gymFotos/ejercicios/<?= $ejercicios->foto?>"/>
<h2>Informacion del ejericio: <?=$ejercicios->nombreEjercicio?></h2>
<h3>Descripción: <?= $ejercicios->descripcion?></h3>
<h3>Calorias: <?= $ejercicios->calorias?></h3>


<form action="index.php?controller=Ejercicios&action=addEjercicio&id=<?= $ejercicios->id ?>" method="POST">
    <button onclick="history.back()">Volver</button>
    <button>Añadir ejercicio a mi entrenamiento</button>
</form>
<?php
    include 'views/footer.php';
?>
