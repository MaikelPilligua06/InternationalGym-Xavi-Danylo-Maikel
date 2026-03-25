<?php
    include 'header.php';
    ?>
<h2>Informacion del ejericio: <?=$ejercicios->nombre?></h2>


<h3>Número de series: <?= $ejercicios->series?></h3>
<h3>Repeticiones: <?= $ejercicios->repeticiones?></h3>
<h3>Peso: <?= $ejercicios->peso?></h3>
<h3>Descripción: <?= $ejercicios->descripcion?></h3>

<form action="index.php?controller=Ejercicios&action=addEjercicio&id=<?= $ejercicios->id ?>" method="POST">
    <button onclick="history.back()">Volver</button>
    <button>Añadir ejercicio a mi entrenamiento</button>
</form>
<?php
    include 'footer.php';
?>
