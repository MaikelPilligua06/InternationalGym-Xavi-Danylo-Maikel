<?php
    include 'header.php';
    ?>

<h2>Perdida Calorica de este mes</h2>
<hr>

<div>
    <h2>Crear mes</h2>
</div>
<div>

    <h3>Este dia has perdido un total de <?= $resumen->caloriasConsumidas?>kCAL</h3>
    <h3>Estas a x CAL de alcanzar tu objetivo!!</h3>
    <h3>¿Quieres ajustar tu objetivo calórico?</h3>
    <p>Clica aqui para hacerlo!!</p>
</div>
<?php
    include 'footer.php';
?>
