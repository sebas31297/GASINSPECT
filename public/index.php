<?php

require_once __DIR__ . '/../autoload.php';

use app\controllers\UsuarioController;

$action = $_GET['action'] ?? 'formulario';

$usuarioController = new UsuarioController();

switch ($action) {
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioController->registrarUsuario($_POST);
        } else {
            // Si se accede por GET a registrar, redirigimos o mostramos formulario
            $usuarioController->mostrarFormularioRegistro();
        }
        break;

    case 'formulario':
    default:
        $usuarioController->mostrarFormularioRegistro();
        break;
}