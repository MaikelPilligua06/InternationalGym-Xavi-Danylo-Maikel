<?php
    include 'views/header.php';
?>
<div>
    <h1>ASD</h1>
    <div>
        <h1>Tu entrenador es</h1>
        <?php foreach($lista as $entrenadorUsuario): ?>
            <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenadorUsuario->id;?>">
            <h3><?php echo $entrenadorUsuario->nombreEntrenador, '', $entrenadorUsuario->apellido;?></h3>
            <h2><?php echo $entrenadorUsuario->correoElectronico;?></h2>
            <h2><?php echo $entrenadorUsuario->descripcion;?></h2>
        </a>
        <?php endforeach; ?>
    </div>
    <div>
        <h2>Todos los entrenadores</h2>
        <?php foreach ($entrenadores as $entrenador): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id;?>">
            <h3><?php echo $entrenador->nombreEntrenador, ' ', $entrenador->apellido;?></h3>
            <p><?php echo $entrenador->descripcion;?></p>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php
    include 'views/footer.php';
?>
