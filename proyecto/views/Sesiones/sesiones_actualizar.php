<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Actualizar sesión</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/actualizar.css"
</head>

<body>

<?php
include 'views/header.php';
?>

<main class="pagina">

    <button class="boton-volver" onclick="history.back()">
        Volver
    </button>

    <form class="formulario-sesion"
          action="index.php?controller=Sesiones&action=actulizarSesion&id=<?= $sesion->id;?>"
          method="POST"
          enctype="multipart/form-data">

        <h2 class="titulo-formulario">Actualizar sesión</h2>

        <label>Detalles de la sesión</label>
        <input type="text"
               name="nombreClase"
               value="<?= $sesion->nombreClase?>">

        <label>Calorías de la sesión</label>
        <input type="text"
               name="calorias"
               value="<?= $sesion->calorias?>">

        <label>Tipo de clase</label>
        <select name="tipoDeClases">

            <option value="Cardio"
                    <?= $sesion->tipoDeClases == 'Cardio' ? 'selected' : '' ?>>
                Cardio
            </option>

            <option value="Cycling"
                    <?= $sesion->tipoDeClases == 'Cycling' ? 'selected' : '' ?>>
                Cycling
            </option>

            <option value="trenSuperior"
                    <?= $sesion->tipoDeClases == 'trenSuperior' ? 'selected' : '' ?>>
                Tren Superior
            </option>

            <option value="trenInferior"
                    <?= $sesion->tipoDeClases == 'trenInferior' ? 'selected' : '' ?>>
                Tren Inferior
            </option>

        </select>

        <label>Fecha de la clase</label>
        <input type="date"
               name="fechaClases"
               value="<?= $sesion->fechaClases?>">

        <label>Duración</label>
        <input type="time"
               name="duracion"
               value="<?= $sesion->duracion?>">

        <label>Descripción</label>
        <textarea name="descripcion"
                  rows="4"
                  placeholder="Descripción de tu sesión"
                  required><?= htmlspecialchars($sesion->descripcion) ?></textarea>

        <label>Foto actual</label>

        <img class="imagen-sesion"
             src="views/gymFotos/sesiones/<?= $sesion->foto?>">

        <label>Actualizar foto</label>

        <input type="file"
               name="foto"
               accept="image/*">

        <input type="hidden"
               name="foto_actual"
               value="<?= $sesion->foto ?>">

        <button class="boton-actualizar" type="submit">
            Actualizar
        </button>

    </form>

</main>

<?php
include 'views/footer.php';
?>

</body>
</html>