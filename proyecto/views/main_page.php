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
    <div class="Ejercicios">
        <h2>Ejercicios</h2>
    </div>
    <div class="Alimentacion">
        <h2>Alimentacion</h2>
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
<?php
 include 'footer.php';
?>
</body>
</html>
