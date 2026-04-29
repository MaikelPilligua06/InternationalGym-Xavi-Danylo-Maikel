<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Crear Rutina</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
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
                <form method="POST" action="index.php?controller=Rutinas&action=agregarPlato">
                    <input type="hidden" name="id"       value="<?= $usuario->id ?>">
                    <input type="hidden" name="nombreEjercicio"   value="<?= $usuario->nombreEjercicio ?>">
                    <input type="hidden" name="descripcion"   value="<?= $usuario->descripcion ?>">
                    <input type="hidden" name="calorias"   value="<?= $usuario->calorias ?>">
                    <input type="hidden" name="foto"   value="<?= $usuario->foto ?>">
                    <button type="submit">Agregar a la Rutina</button>
                </form>
                <button>Eliminar</button>
            </ul>
        <?php endforeach;?>
    </div>
    <div class="contenedorTodoslosEjercicios">
    <h4>Ejercicios que te podrian interesar: </h4>
        <?php foreach ($todoslosEjercicios as $ejercicio) :?>
            <ul>
                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                    <li><?= 'Nombre del ejercicio: ', $ejercicio->nombreEjercicio, ', calorias: ', $ejercicio->calorias?></li>
                </a>
                <form method="POST" action="index.php?controller=Rutinas&action=agregarEjercicio">
                    <input type="hidden" name="id"       value="<?= $ejercicio->id ?>">
                    <input type="hidden" name="nombreEjercicio"   value="<?= $ejercicio->nombreEjercicio ?>">
                    <input type="hidden" name="descripcion"   value="<?= $ejercicio->descripcion ?>">
                    <input type="hidden" name="calorias"   value="<?= $ejercicio->calorias ?>">
                    <input type="hidden" name="foto"   value="<?= $ejercicio->foto ?>">
                    <button type="submit">Agregar a la Rutina</button>
                    <button>Agregar a tus platos preferidos</button>
                </form>
            </ul>
        <?php endforeach;?>
    </div>
</div>
<div class="listadoFinalEjercicios">
    <h3>Tu listado final de ejercicios:</h3>
    <ul>
        <?php if (!empty($_SESSION['rutina_ejercicios'])) : ?>
            <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $p) : ?>
                <li>
                    <?= $p['nombreEjercicio'] ?> — <?= $p['calorias'] ?> kcal
                    <a href="index.php?controller=Rutinas&action=quitarEjercicio&index=<?= $i ?>">Quitar</a>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <li>No hay ejercicios añadidos aún.</li>
        <?php endif; ?>
    </ul>
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