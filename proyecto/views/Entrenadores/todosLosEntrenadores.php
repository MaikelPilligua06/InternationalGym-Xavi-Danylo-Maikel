<?php
    include 'views/header.php';
?>
<div>
    <h1>ASD</h1>
    <div>
        <h1>Tu entrenador es</h1>
        <?php foreach($lista as $entrenadorUsuario): ?>
            <h3><?php echo $entrenadorUsuario->nombre, '', $entrenadorUsuario->apellido;?></h3>
            <h2><?php echo $entrenadorUsuario->correoElectronico;?></h2>
            <h2><?php echo $entrenadorUsuario->descripcion;?></h2>
        <?php endforeach; ?>
    </div>
    <div>
        <h2>Todos los entrenadores</h2>
        <?php foreach ($entrenadores as $entrenador): ?>
                <h3><?php echo $entrenador->nombre, ' ', $entrenador->apellido;?></h3>
            <p><?php echo $entrenador->descripcion;?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php
    include 'views/footer.php';
?>
