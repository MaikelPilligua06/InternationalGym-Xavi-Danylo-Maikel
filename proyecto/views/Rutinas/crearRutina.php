<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="InternationalGYM">
    <title>Crear Rutina — InternationalGYM</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Rutinas/rutinas.css">
</head>
<body>

<?php include "views/header.php"; ?>

<main class="pagina">
    <div class="pagina-cabecera">
        <h1>Crear rutina</h1>
        <div class="pagina-acciones">
            <a href="index.php?controller=Rutinas&action=redirectRutinas" class="boton boton-volver">Volver</a>
        </div>
    </div>

    <section>
        <h3>Crear Rutina</h3>
        <div class="dividir">
            <form action="index.php?controller=Rutinas&action=guardar" method="POST" enctype="multipart/form-data">
                <div class="panel">
                    <div class="panel-titulo">Tus ejercicios</div>
                    <label>Nombre de la Rutina</label>
                    <input class="resumen-elemento-campos" type="text" name="nombreRutina" placeholder="Introduce el nombre">
                    <label>Objetivo</label>
                    <select class="resumen-elemento-campos" name="objetivo">
                        <option value="perder peso">Perder peso</option>
                        <option value="ganar fuerza">Ganar fuerza</option>
                        <option value="estabilidad">Estabilidad</option>
                    </select>
                    <label>Tiempo estimado en completar tu Rutina</label>
                    <input class="resumen-elemento-campos" type="time" name="fechaTiempo">

                    <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $e) : ?>
                        <input type="hidden" name="id_ejercicio[]" value="<?= htmlspecialchars($e['id']) ?>">
                    <?php endforeach; ?>
                    <?php foreach ($_SESSION['rutina_platos'] as $i => $e) : ?>
                        <input type="hidden" name="id_plato[]" value="<?= htmlspecialchars($e['id']) ?>">
                    <?php endforeach; ?>
                    <?php foreach ($_SESSION['rutina_sesiones'] as $i => $e) : ?>
                        <input type="hidden" name="id_sesion[]" value="<?= htmlspecialchars($e['id']) ?>">
                    <?php endforeach; ?>

                    <button class="boton boton-principal">Crear rutina</button>
                </div>
            </form>

            <!-- Ejercicios seleccionados -->
            <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $e) : ?>
                <div class="resumen-elemento">
                    <div class="resumen-elemento-cabecera">
                        <h3>Ejercicios Seleccionados</h3>
                        <span><?= htmlspecialchars($e['nombreEjercicio']) ?></span>
                        <span class="elemento-calorias"><?= $e['calorias'] ?> kcal</span>
                        <a href="index.php?controller=Rutinas&action=quitarEjercicio&index=<?= $i ?>" class="boton-quitar">Quitar</a>
                    </div>
                    <div class="resumen-elemento-campos">
                        <input type="number" name="series" placeholder="Series"/>
                        <input type="number" name="repeticiones" placeholder="Reps"/>
                        <input type="number" name="peso" placeholder="Kg"/>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Sesiones seleccionadas -->
            <?php if (!empty($_SESSION['rutina_sesiones'])) : ?>
                <?php foreach ($_SESSION['rutina_sesiones'] as $i => $s) : ?>
                    <div class="resumen-elemento">
                        <span><?= htmlspecialchars($s['nombreClase']) ?></span>
                        <span class="elemento-calorias"><?= $s['calorias'] ?> kcal</span>
                        <a href="index.php?controller=Rutinas&action=quitarSesion&index=<?= $i ?>" class="boton-quitar">Quitar</a>
                    </div>
                <?php endforeach; ?>

                <!-- Platos seleccionados -->
                <?php if (!empty($_SESSION['rutina_platos'])) : ?>
                    <?php foreach ($_SESSION['rutina_platos'] as $i => $p) : ?>
                        <div class="resumen-elemento">
                            <span><?= htmlspecialchars($p['nombrePlato']) ?></span>
                            <span class="elemento-calorias"><?= $p['calorias'] ?> kcal</span>
                            <a href="index.php?controller=Rutinas&action=quitarPlato&index=<?= $i ?>" class="boton-quitar">Quitar</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <hr/><br/>

    <section>
        <h3>Ejercicios</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus ejercicios</div>
                <?php if (!empty($usuarioEjercicios)) : ?>
                    <?php foreach ($usuarioEjercicios as $ejercicio) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="elemento-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEjercicio">
                                <input type="hidden" name="id"              value="<?= htmlspecialchars($ejercicio->id)?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= htmlspecialchars($ejercicio->calorias) ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes ejercicios guardados.</p>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-titulo">Explorar ejercicios</div>
                <?php if (!empty($todoslosEjercicios)) : ?>
                    <?php foreach ($todoslosEjercicios as $ejercicio) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="elemento-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEjercicio">
                                <input type="hidden" name="id"              value="<?= $ejercicio->id ?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= $ejercicio->calorias ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay ejercicios disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="seccion-alimentacion">
        <h3>Alimentación</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus platos</div>
                <?php if (!empty($usuarioAlimentacion)) : ?>
                    <?php foreach ($usuarioAlimentacion as $plato) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="elemento-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes platos guardados.</p>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-titulo">Explorar platos</div>
                <?php if (!empty($todosLosPlatos)) : ?>
                    <?php foreach ($todosLosPlatos as $plato) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="elemento-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
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
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay platos disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="seccion-sesiones">
        <h3>Sesiones</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus sesiones</div>
                <?php if (!empty($usuarioSesiones)) : ?>
                    <?php foreach ($usuarioSesiones as $sesion) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="elemento-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
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
                                <button type="submit" class="boton boton-principal">Añadir a tu Rutina</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes sesiones guardadas.</p>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-titulo">Explorar sesiones</div>
                <?php if (!empty($todasLasSesiones)) : ?>
                    <?php foreach ($todasLasSesiones as $sesion) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="elemento-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
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
                                <button type="submit" class="boton boton-principal">Añadir a tu Rutina</button>
                            </form>
                            <button type="submit" class="boton boton-principal">Añadir a tus preferencias</button>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay sesiones disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php include "views/footer.php"; ?>
</body>
</html>