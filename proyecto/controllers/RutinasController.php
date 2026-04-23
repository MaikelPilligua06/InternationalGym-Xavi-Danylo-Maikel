<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $ver = $rutinas->verRutinas($id);
        require "views/Rutinas/rutinas_ver.php";
    }
    // Función para crear una rutina Usuario
    public function crearRutina(){
        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $usuarioEjercicios = $rutinas->getUsuariosEjercicios($id);
        $todoslosEjercicios = $rutinas->getTodosLosEjercicios();
        $usuarioAlimentacion = $rutinas->getUsuarioAlimentacion($id);
        $todosLosPlatos = $rutinas->getTodosLosPlatos();
        require "views/Rutinas/crearRutina.php";
    }
}