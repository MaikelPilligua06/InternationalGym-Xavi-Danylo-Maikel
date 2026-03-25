<html lang="es">
<head>	
	<meta charset="UTF-8">
	<meta name="author" content="InternationalGYM">
	<title>International GYM</title>
</head>
<body>
<?php
    include 'header.php';
?>
	<div class="perdidaCal">
		<h2>Pérdida de Calorías</h2>
		<a href="index.php?controller=Resumen&action=verResumen">
			<p>Revisar mis calorias</p>
			<img src="" alt ="Perdida de Calorias" img="kCAL"/>
		</a>
		<?php
			echo "Haz perdido un total de x Calorias";
		?>
	</div>
	<div class="rutinas">
		<h2>Lista Rutinas</h2>
		<a href="index.php?controller=Rutinas&action=redirectRutinas">
			<img src="" alt="Lista de Rutinas"/>
		</a>
	</div>
	<div clas="entrenamiento">
		<h2>Lista Entrenamiento</h2>
		<a href="index.php?controller=Ejercicios&action=listadoEjercicios">
			<img src="" alt="Lista de Entrenamientos">
		</a>
	</div>
    <div class="Sesiones">
        <h2>Lista de Sesiones</h2>
        <a href="index.php?controller=Sesiones&action=index">
            <p>Ver las clases disponibles</p>
            <img src="" alit="Lista de Sesiones"/>
        </a>
    </div>
	<div class="Entrenadores">
		<h2>Lista de Entrenadores</h2>
		<a href="index.php?controller=Rutinas&action=redirectObjetivo">
			<img src="" alt="Lista de Entrenadores"/>
		</a>
	</div>
    <div class="Alimentacion">
        <h2>Lista de Alimentacion</h2>
        <a href="index.php?controller=Alimentacion=index"
            <h1>Prueba</h1>
        </a>
    </div>


<?php
 include 'footer.php';
?>
</body>
</html>
