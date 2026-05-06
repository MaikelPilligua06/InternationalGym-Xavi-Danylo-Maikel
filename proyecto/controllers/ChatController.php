<?php

require_once __DIR__ . "/../models/ChatModel.php";
require_once __DIR__ . "/../models/db.php";

class ChatController
{
    private ChatModel $chatModel;
    private PDO $db;

    public function __construct()
    {
        $this->chatModel = new ChatModel();
        $this->db = conectar();
    }

    public function index()
    {
        $idSesion = $_SESSION['usuario'] ?? null;
        $tipo = $_SESSION['tipo'] ?? null;

        if (!$idSesion || !$tipo) {
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }

        $idUsuario = null;
        $idEntrenador = null;
        $clientes = [];

        if ($tipo === 'usuario') {
            $idUsuario = $idSesion;

            $stmt = $this->db->prepare("
                SELECT id_entrenador
                FROM Usuarios
                WHERE id = ?
                LIMIT 1
            ");
            $stmt->execute([$idUsuario]);
            $usuario = $stmt->fetch();

            $idEntrenador = $usuario['id_entrenador'] ?? null;
        }

        if ($tipo === 'entrenador') {
            $idEntrenador = $idSesion;

            $stmt = $this->db->prepare("
                SELECT id, nombreUsuario, apellido, correoElectronico
                FROM Usuarios
                WHERE id_entrenador = ?
                ORDER BY nombreUsuario ASC
            ");
            $stmt->execute([$idEntrenador]);
            $clientes = $stmt->fetchAll();

            $idUsuario = $_GET['usuario'] ?? ($clientes[0]['id'] ?? null);
        }

        $mensajes = [];

        if ($idUsuario && $idEntrenador) {
            $mensajes = $this->chatModel->obtenerMensajes($idUsuario, $idEntrenador);
        }

        require_once __DIR__ . "/../views/Chat/chat.php";
    }

    public function enviar()
    {
        $idSesion = $_SESSION['usuario'] ?? null;
        $tipo = $_SESSION['tipo'] ?? null;
        $mensaje = trim($_POST['mensaje'] ?? '');

        if (!$idSesion || !$tipo) {
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }

        if ($mensaje === '') {
            header("Location: index.php?controller=Chat&action=index");
            exit;
        }

        if ($tipo === 'usuario') {
            $idUsuario = $idSesion;

            $stmt = $this->db->prepare("
                SELECT id_entrenador
                FROM Usuarios
                WHERE id = ?
                LIMIT 1
            ");
            $stmt->execute([$idUsuario]);
            $usuario = $stmt->fetch();

            $idEntrenador = $usuario['id_entrenador'] ?? null;

            if ($idEntrenador) {
                $this->chatModel->guardarMensaje($idUsuario, $idEntrenador, 'usuario', $mensaje);
            }

            header("Location: index.php?controller=Chat&action=index");
            exit;
        }

        if ($tipo === 'entrenador') {
            $idEntrenador = $idSesion;
            $idUsuario = $_POST['id_usuario'] ?? null;

            if ($idUsuario) {
                $this->chatModel->guardarMensaje($idUsuario, $idEntrenador, 'entrenador', $mensaje);
            }

            header("Location: index.php?controller=Chat&action=index&usuario=" . urlencode($idUsuario));
            exit;
        }
    }
}
