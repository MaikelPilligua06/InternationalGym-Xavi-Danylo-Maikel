<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>International GYM- Rutinas</title>
</head>
<body>
<?php
include "views/header.php";
?>
<h1>Crear una rutina!!</h1>
<div class="contenedorRutinaEjercicios">
    <div class="contenedorEjercicios">
    <h4>Tu listado de ejercicios</h4>
        <?php foreach ($usuarioEjercicios as $usuario) :?>
            <ul>
                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $usuario->id ?>">
                    <li><?='Nombre del ejercicio: ', $usuario->nombreEjercicio, ', calorias: ', $usuario->calorias?></li>
                </a>
                <button>Agregar a la Rutina</button>
                <button>Eliminar</button>
            </ul>
        <?php endforeach;?>
    <h4>Ejercicios que te podrian interesar: </h4>
        <?php foreach ($todoslosEjercicios as $ejercicio) :?>
            <ul>
                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                    <li><?= 'Nombre del ejercicio', $ejercicio->nombreEjercicio, ', calorias: ', $ejercicio->calorias?></li>
                </a>
                <button>Agregar a la Rutina</button>
                <button>Agregar a tus platos preferidos</button>
            </ul>
        <?php endforeach;?>
    </div>
</div>
<div class="listadoFinal">
        <h3>Tu listado final: </h3>
        <p>Total de calorias (comida): 1234</p>
        <p>Total de calorias (ejercicios): 1234</p>
    <p>Tu objetivo: </p>
    </div>
</div>
<div>
    <div>
        <h3>Tu listado de comida: </h3>
        <?php foreach($usuarioAlimentacion as $usuarioAlimentacion) :?>
            <ul>
                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $usuarioAlimentacion->id ?>">
                    <li><?= 'Nombre del Plato: ',$usuarioAlimentacion->nombrePlato, ', calorias: ', $usuarioAlimentacion->calorias, ', proteinas: ', $usuarioAlimentacion->proteinas?></li>
                </a>
                <button>Agregar a tu Rutina</button>
                <button>Eliminar de tus preferencias</button>
            </ul>
        <?php endforeach;?>
    </div>
    <div>
        <h4>Demas comida</h4>
        <h1>ne</h1>
        <?php foreach($todosLosPlatos as $platos) :?>
            <ul>
                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $platos->id ?>">
                    <li><?= 'Nombre del Plato: ', $platos->nombrePlato, ', calorias: ', $platos->calorias, ', proteinas: ', $platos->proteinas?></li>
                </a>
                <button>Agregar a la Rutina</button>
                <button>Agregar a tus preferencias </button>
            </ul>
        <?php endforeach;?>
    </div>
    <h3>Tu listado final: </h3>
    <p>Total de calorias: sga</p>
    <p>Tu objetivo: </p>
</div>
    <a href="index.php?controller=Rutinas&action=redirectRutinas">
<button>Volver</button>
        <button>Crear Rutina</button>
</a>
<?php
    include "views/footer.php";
?>
</body>
</html>