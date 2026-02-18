<?php
require_once "db.php";
require_once "Rutinas.php";
class PermisosModel{
	public function getAll() {
		$db = conectar();
		$stmt = $db->prepare("SELECT * FROM resumenDiario");
	}

	public function rutinas() {
		$db = conectar();
		$stmt = $db->prepare("SELECT * FROM rutinas");
		$stmt->execute();

	}
	public function rutinaUsuario(Rutinas $rutinas) {
		$db = conectar();
		$stmt = $db->prepare("SELECT * FROM rutinas where usuario_rutina = ':usuario_rutina'");
		$stmt->execute([':usuario_rutina' => $rutinas->usuario_rutina]);

	}
	public function rutinasRecomendadas() {
		$db = conectar();
		$stmt = $db->prepare("SELECT * FROM rutinas ORDER BY recomendacion DESC");
		$stmt->execute();
	}
	public function crearRutina() {
		$db = conectar();
		$stmt = $db->prepare("INSERT INTO nombre_rutina, objetivo) VALUES (:nombre_rutina, :objetivo)");
	}
}

?>
