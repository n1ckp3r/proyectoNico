<?php

spl_autoload_register(function ($class) {
    // Convertir el nombre de la clase en una ruta relativa
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // Definir la ruta base para las clases
    $baseDir = __DIR__ . '/app/';

    // Ruta completa del archivo
    $file = $baseDir . $classPath;

    // Incluir el archivo si existe
    if (file_exists($file)) {
        require_once $file;
    }
});
?>