<?php

function conectar() {
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    return new PDO(
        "mysql:host=intgym;dbname=InternationalGym;charset=utf8mb4",
        "intgym",
        "1234",
        $opciones
    );
}
?>
