<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Crear plato</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/crearPlato.css"
</head>
<body>
<?php
include 'views/header.php';
?>

<div class="contenedor-plato">
    <h1>Crea un plato</h1>

    <?php if (!empty($_SESSION['mensaje'])): ?>
        <p class="alerta correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="alerta error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form action="index.php?controller=Alimentacion&action=crear" method="POST" enctype="multipart/form-data" class="formulario-plato">
        <div>
            <label class="etiqueta-plato">Nombre del plato</label>
            <input type="text" name="nombrePlato" placeholder="Introduzca el nombre del plato" required />
        </div>

        <div>
            <label class="etiqueta-plato">Objetivo del plato</label>
            <select name="objetivo">
                <option value="perder peso">Perder peso</option>
                <option value="ganar fuerza">Ganar fuerza</option>
                <option value="estabilidad">Estabilidad</option>
            </select>
        </div>

        <div>
            <label class="etiqueta-plato">Descripción</label>
            <textarea name="descripcion" rows="4" placeholder="Introduzca la descripción" required></textarea>
        </div>

        <div>
            <label class="etiqueta-plato">Calorías</label>
            <input type="number" name="calorias" placeholder="Introduzca las calorías"/>
        </div>

        <div>
            <label class="etiqueta-plato">Proteínas</label>
            <input type="number" name="proteinas" placeholder="Introduzca las calorías"/>
        </div>

        <div>
            <label class="etiqueta-plato">Carbohidratos</label>
            <input type="number" name="carbohidratos" placeholder="Introduzca las calorías"/>
        </div>

        <div>
            <label class="etiqueta-plato">Grasas</label>
            <input type="number" name="grasas" placeholder="Introduzca las calorías"/>
        </div>

        <div>
            <label class="etiqueta-plato">Imagen del plato</label>
            <input type="file" name="foto" accept="image/*"/>
        </div>

        <div class="contenedor-botones">
            <button type="button" class="btn-volver" onclick="history.back()">← Volver atrás</button>
            <button type="submit" class="btn-publicar">Publicar</button>
        </div>
    </form>
</div>

<?php
include 'views/footer.php';
?>
</body>
</html>
