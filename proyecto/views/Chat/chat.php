<?php
include __DIR__ . "/../header.php";

$tipo = $_SESSION['tipo'] ?? '';
$esEntrenador = ($tipo === 'entrenador');

$mensajes = $mensajes ?? [];
$clientes = $clientes ?? [];
$idUsuario = $idUsuario ?? null;
$idEntrenador = $idEntrenador ?? null;
?>

<link rel="stylesheet" href="views/Chat/chat.css?v=2">

<div class="chat-page">
    <div class="chat-container">

        <div class="chat-top">
            <div>
                <span class="chat-brand">INTERNATIONALGYM</span>

                <?php if ($esEntrenador): ?>
                    <h1>Mensajes de clientes</h1>
                    <p>Responde las dudas de tus clientes sobre ejercicios, rutinas o alimentación.</p>
                <?php else: ?>
                    <h1>Chat con entrenador</h1>
                    <p>Escribe a tu entrenador para resolver dudas de ejercicios, rutinas o alimentación.</p>
                <?php endif; ?>
            </div>

            <span class="chat-available">Disponible</span>
        </div>

        <div class="chat-box">

            <?php if ($esEntrenador): ?>
                <aside class="chat-clients">
                    <h2>Clientes</h2>

                    <?php foreach ($clientes as $cliente): ?>
                        <a
                            class="client-item <?= ((int)$idUsuario === (int)$cliente['id']) ? 'active' : '' ?>"
                            href="index.php?controller=Chat&action=index&usuario=<?= htmlspecialchars($cliente['id']) ?>"
                        >
                            <strong>
                                <?= htmlspecialchars($cliente['nombreUsuario'] ?? 'Cliente') ?>
                                <?= htmlspecialchars($cliente['apellido'] ?? '') ?>
                            </strong>
                            <span><?= htmlspecialchars($cliente['correoElectronico'] ?? '') ?></span>
                        </a>
                    <?php endforeach; ?>
                </aside>
            <?php endif; ?>

            <section class="chat-content">
                <div class="chat-messages">

                    <?php if (empty($mensajes)): ?>
                        <div class="chat-empty">
                            <strong>No hay mensajes todavía</strong>
                            <p>
                                <?= $esEntrenador ? 'Escribe el primer mensaje al cliente.' : 'Empieza la conversación con tu entrenador.' ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($mensajes as $mensaje): ?>
                            <?php
                            $propio = $esEntrenador
                                ? ($mensaje['enviado_por'] === 'entrenador')
                                : ($mensaje['enviado_por'] === 'usuario');
                            ?>

                            <div class="message <?= $propio ? 'message-own' : 'message-other' ?>">
                                <p><?= nl2br(htmlspecialchars($mensaje['mensaje'])) ?></p>
                                <span><?= htmlspecialchars($mensaje['fechaHora']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <?php if (!$esEntrenador || $idUsuario): ?>
                    <form class="chat-form" method="POST" action="index.php?controller=Chat&action=enviar">
                        <?php if ($esEntrenador): ?>
                            <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($idUsuario) ?>">
                        <?php endif; ?>

                        <input type="text" name="mensaje" placeholder="Escribe un mensaje..." autocomplete="off" required>
                        <button type="submit">Enviar</button>
                    </form>
                <?php endif; ?>
            </section>

        </div>
    </div>
</div>

<?php
include __DIR__ . "/../footer.php";
?>
