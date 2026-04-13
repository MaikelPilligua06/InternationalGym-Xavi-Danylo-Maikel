<?php
    include 'views/header.php';
    ?>

<div>
    <h1><?php echo $entrenador->nombre, ' ',  $entrenador->apellido;?></h1>
    <h2>Correo Electronico: <?php echo $entrenador->correoElectronico;?></h2
        <p>Dispobilidad horaria: <?php echo $entrenador->disponibilidadHoraria;?></p>
    <p><?php echo $entrenador->descripcion;?></p>
</div>
<div>
    <h2>Sesiones del entrenador</h2>
    <?php foreach ($sesiones as $sesion): ?>
        <p><?php $sesion->nombre?></p>
    <?php endforeach; ?>
</div>
<form>
    <button>Cambiar de entrenador</button>
    <button>Volver</button>
</form>
<?php
    include 'views/footer.php';
?>
