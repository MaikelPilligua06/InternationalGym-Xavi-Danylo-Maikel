<?php
require_once "core/ACL.php";
require_once "models/PermisosModel.php";

class PermisosController {
	public function index(){
		$model = new PermisosModel();
		$permisos = $model->getAll();
		require "views/main_page.php";
	}
}
