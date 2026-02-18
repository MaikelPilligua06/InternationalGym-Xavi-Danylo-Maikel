<?php

class ACL {
//** Falta defirnir los permisos */
	private static $permisos = [
    	'cliente' => [
        	'asd.asd'
    	],
    	'entrenador' =>[
    		'asd.asd'
    	]
	];

	public static function puede($accion) {

    	if (!isset($_SESSION['rol'])) {
        	return false;
    	}

    	$rol = $_SESSION['rol'];

    	return in_array($accion, self::$permisos[$rol]);
	}
}

?>
