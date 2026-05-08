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
	<div class="perdidaCal">
		<a href="index.php?controller=Resumen&action=verResumen">
			<img src="" alt ="Perdida de Calorias" img="kCAL"/>
		</a>
		<?php
			echo "Haz perdido un total de x Calorias";
		?>
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
        <div class="Alimentacion-datos">
            <ul>
                <li>Tu Objetivo: </li>
                <li>Calorias:</li>
                <li>Nombre de ejercicio:</li>
                <li>Series: </li>
                <li>Repeticiones: </li>
                <li>Peso: </li>
            </ul>
        </div>
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
        <h3>Seguimiento de tu alimentación</h3>
        <div class="Alimentacion-datos">
            <ul>
                <li>Nombre del Plato: </li>
                <li>Calorias:</li>
                <li>Proteinas:</li>
                <li>Grasas: </li>
                <li>Carbohidratos: </li>

            </ul>
        </div>
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
                    <a href="index.php?controller=Sesiones&action=eliminarSesion&id=<?= $fila->id ?>">
                        <button>Eliminar</button>
                    </a>
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
