<?php
    include 'views/header.php';
?>
<div>
    <h1>ASD</h1>
    <div>
        <?php foreach ($entrenadores as $entrenador): ?>
                <h3><?php echo $entrenador->nombre, ' ', $entrenador->apellido;?></h3>
            <p><?php echo $entrenador->descripcion;?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php
    include 'views/footer.php';
?>
