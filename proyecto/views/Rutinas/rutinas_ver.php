<html lang="es">
<head>	
	<meta charset="UTF-8">
	<meta name="author" content="InternationalGYM">
	<title>International GYM- Rutinas</title>
</head>
<body>
<?php
    include 'views/header.php';
?>
<div>
    <h3>Selecciona una Rutina</h3>
    <p>Aqui seleccionaras tu rutina que haras el dia de hoy</p>
</div>
<div>
    <h3>Tu rutina de hoy</h3>
    <p>Total de calorias consumidas (alimentación): </p>
    <p>Total de calorias quemadas (entrenos): </p>
    <p>Total de proteinas</p>
    <p>Total de carbohidrados</p>
    <p>Duración: </p>
    <p>Listado de Ejercicios: </p>
    <p>Listado de Comida: </p>
</div>

<div>
    <h3>Crea una Rutina</h3>
    <a href="index.php?controller=Rutinas&action=crearRutina">
        <button>Crear una rutina</button>
    </a>
</div>
<?php
    include 'views/footer.php';
?>
</body>
</html>
