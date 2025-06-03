<?php
require_once '../app/controllers/UsuarioController.php';
require_once '../app/controllers/AccesoController.php';
require_once '../app/config/database.php';

use app\controllers\UsuarioController;
use app\controllers\AccesoController;

session_start();//agrego en editar

$action = $_GET['action'] ?? 'login';

$AccesoController = new AccesoController();
$usuarioController = new UsuarioController();


switch ($action) {

    case 'login':
        $AccesoController->mostrarFormulariologin();
        break;
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
    case 'eliminar':
        $usuarioController->eliminarUsuario();
        break;

    default:
        // Por seguridad, muestra el formulario de registro si no se reconoce la acción
        $AccesoController->mostrarFormulariologin();
        break;
}