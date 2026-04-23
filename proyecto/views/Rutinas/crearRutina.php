<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>International GYM- Rutinas</title>
    <link rel="stylesheet" href="views/rutinas.css">
</head>
<body>
<?php
include "views/header.php";
?>
<h1>Crear una rutina!!</h1>
<div class="contenedorRutinaEjercicios">
    <div class="contenedorEjercicios">
    <h4>Tu listado de ejercicios</h4>

    <h4>Demas ejercicios</h4>
    <p>Total de calorias: ASD141</p>
    </div>
    <div class="listadoFinal">
        <h3>Tu listado final: </h3>
        <p>Total de calorias: PRUEBA</p>
        <p>Tu objetivo: </p>
    </div>
</div>
<div>
    <h3>Tu listado de comida: </h3>
    <h4>Demas comida</h4>
    <p>Total de calorias: sfa</p>

    <h3>Tu listado final: </h3>
    <p>Total de calorias: sga</p>
    <p>Tu objetivo: </p>
</div>
    <a href="index.php?controller=Rutinas&action=redirectRutinas">
<button>
Volver
</button>
</a>
<?php
    include "views/footer.php";
?>
</body>
</html>