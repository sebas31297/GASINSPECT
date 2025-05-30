<?php
namespace app\controllers;
require_once __DIR__ . '/../models/UsuarioModel.php';

use app\models\UsuarioModel;

class AccesoController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $modelo = new UsuarioModel();
            $usuario = $modelo->getUsuarioPorEmail($email);

            // ⚠️ Asegúrate de que la contraseña esté encriptada con password_hash
            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_email'] = $usuario['correo'];
                header('Location: inicio.html'); // Cambia esto a donde quieras redirigir después del login
                exit;
            } else {
                header('Location: acceso.php?error=1');
                exit;
            }
        }
    }
}