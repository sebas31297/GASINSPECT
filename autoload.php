<?php
spl_autoload_register(function ($class) {
    // Reemplaza los backslash '\' del namespace por slash '/' para ruta
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Ruta base del proyecto (ajusta si hace falta)
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;

    // Construimos la ruta al archivo PHP
    $file = $baseDir . $classPath . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});