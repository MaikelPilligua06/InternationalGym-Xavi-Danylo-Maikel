<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="InternationalGYM">
    <meta charset="UTF-8">
    <title>Crear Rutina — InternationalGYM</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Rutinas/rutinas.css">

</head>
<body>

<?php include "views/header.php"; ?>

<main class="pagina">
    <div class="pagina-header">
        <h1>Crear rutina</h1>
        <div class="pagina-header-actions">
            <a href="index.php?controller=Rutinas&action=redirectRutinas" class="btn btn-ghost">Volver</a>
        </div>
    </div>


    <section class="section">
        <h3>Crear Rutina</h3>
        <div class="dividir">
        <form action="index.php?controller=Rutinas&action=guardar" method="POST" enctype="multipart/form-data">
            <div class="panel">
                <div class="panel-title">Tus ejercicios</div>
                <label>Nombre de la Rutina</label>
                    <input type="text" name="nombreRutina" placeholder="Introduce el nombre">
                <label>Objetivo</label>
                <select name="objetivo">
                    <option value="perder peso">Perder peso</option>
                    <option value="ganar fuerza">Ganar fuerza</option>
                    <option value="estabilidad">Estabilidad</option>
                </select>
                <label>Tiempo estimado en completar tu Rutina</label>
                <input type="time" name="fechaTiempo">

                <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $e) : ?>
                    <input type="hidden" name="id_ejercicio[]" value="<?= htmlspecialchars($e['id']) ?>">
                <?php endforeach; ?>

                <?php foreach ($_SESSION['rutina_platos'] as $i => $e) : ?>
                    <input type="hidden" name="id_plato[]" value="<?= htmlspecialchars($e['id']) ?>">
                <?php endforeach; ?>

                <?php foreach ($_SESSION['rutina_sesiones'] as $i => $e) : ?>
                    <input type="hidden" name="id_sesion[]" value="<?= htmlspecialchars($e['id']) ?>">
                <?php endforeach; ?>

                <button class="btn btn-primary">Crear rutina</button>
            </div>
            </form>
        </div>
    </section>

    <br/>
    <section class="section">

        <h3>Ejercicios</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-title">Tus ejercicios</div>
                <?php if (!empty($usuarioEjercicios)) : ?>
                    <?php foreach ($usuarioEjercicios as $ejercicio) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="item-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEjercicio">
                                <input type="hidden" name="id"              value="<?= htmlspecialchars($ejercicio->id)?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= htmlspecialchars($ejercicio->calorias) ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="btn-add">+ Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No tienes ejercicios guardados.</div>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-title">Explorar ejercicios</div>
                <?php if (!empty($todoslosEjercicios)) : ?>
                    <?php foreach ($todoslosEjercicios as $ejercicio) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="item-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEjercicio">
                                <input type="hidden" name="id"              value="<?= $ejercicio->id ?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= $ejercicio->calorias ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="btn-add">+ Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No hay ejercicios disponibles.</div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($_SESSION['rutina_ejercicios'])) : ?>
                <div class="resumen-card-title">Seleccionados</div>
                <div class="resumen-list">
                    <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $e) : ?>
                        <div class="resumen-item">
                            <span><?= htmlspecialchars($e['nombreEjercicio']) ?></span>
                            <span class="item-kcal"><?= $e['calorias'] ?> kcal</span>
                            <a href="index.php?controller=Rutinas&action=quitarEjercicio&index=<?= $i ?>" class="btn-remove">Quitar</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </section>

    <section class="section" id="seccion-alimentacion">

        <h3>Alimentación</h3>

        <div class="dividir">

            <div class="panel">
                <div class="panel-title">Tus platos</div>
                <?php if (!empty($usuarioAlimentacion)) : ?>
                    <?php foreach ($usuarioAlimentacion as $plato) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="item-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No tienes platos guardados.</div>
                <?php endif; ?>
            </div>
            <div class="panel">
                <div class="panel-title">Explorar platos</div>
                <?php if (!empty($todosLosPlatos)) : ?>
                    <?php foreach ($todosLosPlatos as $plato) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="item-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarPlato">
                                <input type="hidden" name="id"            value="<?= $plato->id ?>">
                                <input type="hidden" name="objetivo"      value="<?= htmlspecialchars($plato->objetivo) ?>">
                                <input type="hidden" name="calorias"      value="<?= $plato->calorias ?>">
                                <input type="hidden" name="nombrePlato"   value="<?= htmlspecialchars($plato->nombrePlato) ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($plato->descripcion) ?>">
                                <input type="hidden" name="proteinas"     value="<?= $plato->proteinas ?>">
                                <input type="hidden" name="carbohidratos" value="<?= $plato->carbohidratos ?>">
                                <input type="hidden" name="grasas"        value="<?= $plato->grasas ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($plato->foto) ?>">
                                <button type="submit" class="btn-add">+ Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No hay platos disponibles.</div>
                <?php endif; ?>
            </div>

        </div>

        <?php if (!empty($_SESSION['rutina_platos'])) : ?>
            <div class="resumen-card" style="margin-top: 12px;">
                <div class="resumen-card-title">Seleccionados</div>
                <div class="resumen-list">
                    <?php foreach ($_SESSION['rutina_platos'] as $i => $p) : ?>
                        <div class="resumen-item">
                            <span><?= htmlspecialchars($p['nombrePlato']) ?></span>
                            <span class="item-kcal"><?= $p['calorias'] ?> kcal</span>
                            <a href="index.php?controller=Rutinas&action=quitarPlato&index=<?= $i ?>" class="btn-remove">Quitar</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </section>

    <section class="section" id="seccion-sesiones">
        <div class="section-label">Sesiones</div>
        <div class="dividir">
            <div class="panel">
                <div class="panel-title">Tus sesiones</div>
                <?php if (!empty($usuarioSesiones)) : ?>
                    <?php foreach ($usuarioSesiones as $sesion) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="item-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarSesion">
                                <input type="hidden" name="id"            value="<?= $sesion->id ?>">
                                <input type="hidden" name="nombreClase"   value="<?= htmlspecialchars($sesion->nombreClase) ?>">
                                <input type="hidden" name="tipoDeClases"  value="<?= htmlspecialchars($sesion->tipoDeClases) ?>">
                                <input type="hidden" name="fechaClases"   value="<?= $sesion->fechaClases ?>">
                                <input type="hidden" name="duracion"      value="<?= $sesion->duracion ?>">
                                <input type="hidden" name="id_entrenador" value="<?= $sesion->id_entrenador ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($sesion->descripcion) ?>">
                                <input type="hidden" name="calorias"      value="<?= $sesion->calorias ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($sesion->foto) ?>">
                                <button type="submit" class="btn-add">Añadir a tu Rutina</button>
                            </form>
                            <button type="submit" class="btn-add">Eliminar</button>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No tienes sesiones guardadas.</div>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-title">Explorar sesiones</div>
                <?php if (!empty($todasLasSesiones)) : ?>
                    <?php foreach ($todasLasSesiones as $sesion) : ?>
                        <div class="item-row">
                            <div class="item-info">
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>" class="item-link">
                                    <div class="item-name"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="item-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarSesion">
                                <input type="hidden" name="id"            value="<?= $sesion->id ?>">
                                <input type="hidden" name="nombreClase"   value="<?= htmlspecialchars($sesion->nombreClase) ?>">
                                <input type="hidden" name="tipoDeClases"  value="<?= htmlspecialchars($sesion->tipoDeClases) ?>">
                                <input type="hidden" name="fechaClases"   value="<?= $sesion->fechaClases ?>">
                                <input type="hidden" name="duracion"      value="<?= $sesion->duracion ?>">
                                <input type="hidden" name="id_entrenador" value="<?= $sesion->id_entrenador ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($sesion->descripcion) ?>">
                                <input type="hidden" name="calorias"      value="<?= $sesion->calorias ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($sesion->foto) ?>">
                                <button type="submit" class="btn-add">Añadir a tu Rutina</button>
                            </form>
                            <a>
                                <button type="submit" class="btn-add">Añadir a tus preferencias</button>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="empty-state">No hay sesiones disponibles.</div>
                <?php endif; ?>
            </div>

        </div>

        <?php if (!empty($_SESSION['rutina_sesiones'])) : ?>
             <div class="resumen-card-title">Seleccionadas</div>
                <div class="resumen-list">
                    <?php foreach ($_SESSION['rutina_sesiones'] as $i => $s) : ?>
                        <div class="resumen-item">
                            <span><?= htmlspecialchars($s['nombreClase']) ?></span>
                            <span class="item-kcal"><?= $s['calorias'] ?> kcal</span>
                            <a href="index.php?controller=Rutinas&action=quitarSesion&index=<?= $i ?>" class="btn-remove">Quitar</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include "views/footer.php"; ?>

</body>
</html>