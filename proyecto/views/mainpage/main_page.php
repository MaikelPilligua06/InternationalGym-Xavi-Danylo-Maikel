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
<div class="imgEntrenos">
    <a href="index.php?controller=Ejercicios&action=listadoEjercicios">
        <img src="/views/gymFotos/EntrenoIMG.png"/>
        <div class="textoIMG">Ver tus ejercicios</div>
    </a>
</div>
    <div class="Alimentacion">
        <h2>Alimentacion</h2>
        <div>
            <a href="index.php?controller=Alimentacion&action=index">
                <img src="views/gymFotos/EnsaladaIMG.jpg" alt="Acceso a tus platos platos"/>
                <h1>Ver tus platos</h1>
            </a>
        </div>
        <h3>Seguimiento de tu alimentación</h3>
        <div class="Alimentacion-datos">
            <ul>
                <li>Tu Objetivo: </li>
                <li>Calorias:</li>
                <li>Proteinas:</li>
                <li>Grasas: </li>
                <li>Carbohidratos: </li>
                <li>Protenias: </li>
            </ul>
        </div>
    </div>
    <div class="Entrenador">
        <h2>Entrenador</h2>
        <h3>Tu entrenador tiene las siguientes sesiones activas</h3>
        <h4>Ver más entrenadores</h4>
    </div>
</div>
</main>
<?php
 include 'views/footer.php';
?>
</body>
</html>
