<header class="tn-header">
    <div class="tn-container tn-header__inner">
        <a class="tn-brand" href="index.php?controller=Resumen&action=index">
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
            <a href="index.php?controller=Entrenador&action=getAllEntrenadores">Entrenadores</a>
            <a href="index.php?controller=Alimentacion&action=index">Alimentación</a>
        </nav>

        <div class="tn-actions">
            <?php if (isset($_SESSION['id'])): ?>
            <a class="tn-btn tn-btn--primary" href="index.php?controller=Usuario&action=index">Mi Perfil</a>
            <?php else :?>
                <a class="tn-btn tn-btn--ghost" href="index.php?controller=Auth&action=login">Acceder</a>
                <a class="tn-btn tn-btn--primary" href="index.php?controller=Usuario&action=registro">Prueba gratis</a>
            <?php endif;?>
            <button class="tn-burger" type="button" aria-label="Abrir menú">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
