<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Página de inicio</title>
    <meta charset="UTF-8">
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/mainpage/main_page.css">
</head>
<body>
<?php
    include 'views/header.php';
?>
<main>
<div class="pagina-principal">
    <div class="Ejercicios">
        <h2>Resumen</h2>
    </div>
	<div class="Fotos">
		<a href="index.php?controller=Resumen&action=verResumen">
            <img src="/views/gymFotos/calendario1.jpeg"/>
            <div class="textoIMG">Ver tu Resumen</div>
        </a>

	</div>
    <div class="Ejercicios">
        <h2>Ejercicios</h2>
    </div>
<div class="Fotos">
    <a href="index.php?controller=Ejercicios&action=listadoEjercicios">
        <img src="/views/gymFotos/EntrenoIMG.png"/>
        <div class="textoIMG">Ver tus ejercicios</div>
    </a>
</div>
    <div class="Alimentacion">
        <h3>Seguimiento de tus ejercicios</h3>
        <?php if (!empty($rutinas)) : ?>
        <?php foreach ($rutinas as $rutina): ?>
            <?php foreach ($rutina->ejercicios as $ejercicio): ?>
        <a class="nombre-item" href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
        <div class="Alimentacion-datos">
                    <ul>
                        <li>Nombre de ejercicio: <?= htmlspecialchars($ejercicio->nombreEjercicio) ?></li>
                        <li>Series: <?= $ejercicio->series ?></li>
                        <li>Repeticiones: <?= $ejercicio->repeticiones ?></li>
                        <li>Peso: <?= $ejercicio->peso ?></li>
                        <li>Calorías: <?= $ejercicio->calorias ?></li>
                    </ul>
                </div>
        </a>
        <!-- ... tu código anterior ... -->
        <hr/> <br/>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <?php else : ?>
        <div class="Alimentacion">
            <h3>Ejercicios de hoy</h3>
            <div class="Alimentacion-datos">
                <h3>No hemos encontrado ningún ejercicio en la rutina de hoy.</h3>
                <p style="color: gray; font-size: 14px; margin-bottom: 16px;">¡Actualiza tu Rutina Diaria para empezar a entrenar!</p>

                <div class="seSion" style="gap: 16px;">
                    <a href="index.php?controller=Rutinas&action=redirectRutinas" class="Entrenador" style="padding: 0; border: none;">
                        <h4>Actualizar Rutina diaria</h4>
                    </a>
                    <a href="index.php?controller=Rutinas&action=crearRutina" class="Entrenador" style="padding: 0; border: none;">
                        <h4 style="color: white; border-color: gray;">Crear una Rutina</h4>
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <div class="Ejercicios">
        <h2>Alimentacion</h2>
    </div>
    <div class="Fotos">
        <a href="index.php?controller=Alimentacion&action=index">
            <img src="views/gymFotos/EnsaladaIMG.jpg" alt="Acceso a tus platos platos"/>
            <div class="textoIMG">Ver tus platos</div>
        </a>
    </div>
    <div class="Alimentacion">
        <h2>Seguimiento de tu alimentación</h2>
        <?php if (!empty($rutinas)) : ?>
            <?php foreach ($rutinas as $rutina): ?>
                <?php foreach ($rutina->platos as $platos): ?>
                    <div style="margin-bottom: 24px;">
                        <h3 style="color: yellow; margin-bottom: 8px;">🍽️ <?= htmlspecialchars($platos->nombrePlato) ?></h3>
                        <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $platos->id ?>" class="Alimentacion-datos">
                            <ul>
                                <li>Calorías: <?= $platos->calorias ?> kcal</li>
                                <li>Proteínas: <?= $platos->proteinas ?>g</li>
                                <li>Grasas: <?= $platos->grasas ?>g</li>
                                <li>Carbohidratos: <?= $platos->carbohidratos ?>g</li>
                            </ul>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="Alimentacion-datos">
                <h3>No hemos encontrado ningún plato en la rutina de hoy.</h3>
                <p style="color: gray; font-size: 14px; margin-bottom: 16px;">¡Actualiza tu Rutina Diaria!</p>

                <div class="seSion" style="gap: 16px;">
                    <a href="index.php?controller=Rutinas&action=redirectRutinas" class="Entrenador" style="padding: 0; border: none;">
                        <h4>Actualizar Rutina diaria</h4>
                    </a>
                    <a href="index.php?controller=Rutinas&action=crearRutina" class="Entrenador" style="padding: 0; border: none;">
                        <h4 style="color: white; border-color: white;">Crear una Rutina</h4>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="Entrenador">

        <?php if (!empty($entrenadorSesiones)) : ?>
            <h4>Sesions Activas de mi entrenador</h4>

        <div class="seSion">

            <?php foreach ($entrenadorSesiones as $fila) : ?>
                <div class="topsesion">
                    <a href="index.php?controller=Sesiones&action=getId&id=<?= $fila->id ?>">
                        <p>Nombre de la clase: <?= $fila->nombreClase ?></p>
                        <p>Tipo de la clase: <?= $fila->tipoDeClases ?></p>
                        <p><?= $fila->duracion ?></p>
                        <p><?= $fila->fechaClases ?></p>
                    </a>
                    <div class="button">
                </div>
                </div>

        <?php endforeach; ?>
        <?php else : ?>
        <h4>Tu entrenador no tiene sesiones activas</h4>
        <?php endif; ?>

        </div>
        <a href="index.php?controller=Entrenador&action=getAllEntrenadores">

            <h4>Ver más entrenadores</h4>
        </a>
    </div>
</div>
</main>
<?php
 include 'views/footer.php';
?>
</body>
</html>
