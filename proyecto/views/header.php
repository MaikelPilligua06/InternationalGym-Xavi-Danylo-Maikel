<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGym">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="tn-header">
    <div class="tn-container tn-header__inner">
        <a class="tn-brand" href="#">
            <span class="tn-brand__mark" aria-hidden="true">TN</span>
            <span class="tn-brand__text">
        <strong>InternationalGym</strong>
        <small>Gym • Performance • Tech</small>
      </span>
        </a>
        <nav class="tn-nav" aria-label="Navegación principal">
            <a href="index.php?controller=Resumen&action=verResumen">Resumen</a>
            <a href="index.php?controller=Rutinas&action=redirectRutinas">Rutinas</a>
            <a href="index.php?controller=Ejercicios&action=listadoEjercicios">Entreno</a>
            <a href="index.php?controller=Sesiones&action=index">Sesiones</a>
            <a href="index.php?controller=Entrenadores&action=getEntrenador">Entrenadores</a>
            <a href="index.php?controller=Alimentacion&action=index">Alimentación</a>
        </nav>

        <div class="tn-actions">
            <a class="tn-btn tn-btn--ghost" href="#login">Acceder</a>
            <a class="tn-btn tn-btn--primary" href="#prueba">Prueba gratis</a>

            <button class="tn-burger" type="button" aria-label="Abrir menú">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
</body>