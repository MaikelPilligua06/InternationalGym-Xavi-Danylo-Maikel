<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Listado de todos los Ejercicios</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Ejercicios/ejercicios.css">
</head>
<body>
<?php include "views/header.php"; ?>

<main class="pagina-listado">
    <a href="index.php?controller=Ejercicios&action=listadoEjercicios">
        <button class="boton-volver">Volver</button>
    </a>
    <div class="tarjeta-listado">
        <?php if (!empty($ejercicio)) : ?>
            <?php foreach($ejercicio as $sesion): ?>
                <div class="fila-ejercicio">
                    <img class="foto-ejercicio" src="views/gymFotos/ejercicios/<?= $sesion->foto ?>"/>
                    <a class="nombre-ejercicio" href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $sesion->id ?>">
                        <p><strong>Nombre:</strong> <?= $sesion->nombreEjercicio ?></p>
                        <p><strong>Calorías:</strong> <?= $sesion->calorias ?></p>
                    </a>
                    <div class="acciones-ejercicio">
                        <a href="index.php?controller=Ejercicios&action=getEjerciciosActualizar&id=<?= $sesion->id ?>">
                            <button class="boton-actualizar">Actualizar</button>
                        </a>
                        <a href="index.php?controller=Ejercicios&action=borrarEjercicioApp&id=<?= $sesion->id ?>"
                           onclick="return confirm('¿Estás seguro de querer borrar este ejercicio?')">
                            <button class="boton-borrar">Borrar</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="estado-vacio">
                <h3>No existen ejercicios.</h3>
                <a class="enlace-crear" href="index.php?controller=Ejercicios&action=agregarEjercicio">
                    Crea el primer ejercicio
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include "views/footer.php"; ?>
</body>
</html>