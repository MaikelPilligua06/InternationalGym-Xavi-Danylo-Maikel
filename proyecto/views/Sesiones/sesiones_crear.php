<DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <TITLE>Crear sesión de clases</TITLE>
    </head>
    <body>
    <?php
    include 'views/header.php';
    ?>

        <h1>Crear nueva sesión de clases</h1>
        <form action="index.php?controller=Sesiones&action=crear" method="POST">
            Tipo de clases: <select name="tipoDeClases">
                <option value="Cardio">Cardio</option>
                <option value="Cycling">Cycling</option>
                <option value="trenSuperior">Tren superior</option>
                <option value="trenInferior">Tren inferior</option>
            </select>
            Fecha de la Clase: <input type="date" name="fechaClases" placeholder="Introduzca la fecha"/>
            Duración: <input type="time" name="duracion" placeholder="Introduzca la duración de la clase"/>
        </form>
    <?php
    include 'views/footer.php';
    ?>
    </body>
    </html>


