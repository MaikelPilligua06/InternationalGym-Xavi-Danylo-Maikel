<?php
require_once "db.php";

class PermisosModel{
	public function getAll() {
		$db = conectar();
		$stmt = $db->query("");
		return $permisos;
	}
}

?>
