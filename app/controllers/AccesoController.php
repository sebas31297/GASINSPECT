<?php

namespace app\controllers;

require_once __DIR__ . '/../models/UsuarioModel.php';

use app\models\UsuarioModel;

class AccesoController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $modelo = new UsuarioModel();
            $usuario = $modelo->getUsuarioPorEmail($email);

            // codigo para almacenar contraseña en texto plano
            if ($usuario && $contrasena === $usuario['contrasena']) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_email'] = $usuario['correo'];
                header('Location: /GASINSPECT/app/views/inicio.html'); // redirección a inicio.html
                exit;
            } else {
                header('Location: /GASINSPECT/app/views/acceso.php?error=1');
                exit;
            }
        }
    }

    public function mostrarFormulariologin()
    {
        require_once __DIR__ . '/../views/acceso.php';
    }
}
