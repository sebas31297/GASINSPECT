<?php
require_once '../app/controllers/UsuarioController.php';
use app\controllers\UsuarioController;

$action = $_GET['action'] ?? 'formulario';

$usuarioController = new UsuarioController();

switch ($action) {
    // Registro usuario
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioController->registrarUsuario($_POST);
        } else {
            $usuarioController->mostrarFormularioRegistro();
        }
        break;

    // Mostrar formulario de registro (por defecto o explícito)
    case 'formulario':
        $usuarioController->mostrarFormularioRegistro();
        break;

    // Mostrar formulario para editar perfil
    case 'editarPerfil':
        $usuarioController->mostrarFormularioEditarPerfil();
        break;

    // Procesar actualización del perfil
    case 'actualizar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí puedes agregar $_FILES si manejas subida de foto
            $usuarioController->actualizarUsuario($_POST, $_FILES ?? []);
        } else {
            header('Location: index.php?action=editarPerfil');
            exit;
        }
        break;

    default:
        // Por seguridad, muestra el formulario de registro si no se reconoce la acción
        $usuarioController->mostrarFormularioRegistro();
        break;
}