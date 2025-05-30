<?php
namespace app\controllers;

use app\models\UsuarioModel;


class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }

    public function mostrarFormularioRegistro()
    {
         require_once __DIR__ . '/../views/registroUsuario.php';
    }

   public function registrarUsuario(array $datos)
{
    session_start();

    $nombre = $datos['nombre_usuario'] ?? '';
    $correo = $datos['correo'] ?? '';
    $telefono = $datos['telefono'] ?? '';
    $direccion = $datos['direccion'] ?? '';
    $contrasena = $datos['contrasena'] ?? '';
    $tipo_documento = isset($datos['id_tipo_documento']) ? (int)$datos['id_tipo_documento'] : null;
    $cargo = isset($datos['id_cargo']) ? (int)$datos['id_cargo'] : null;
    $identificacion = $datos['identificacion'] ?? '';
    $foto = null; // Para simplificar

    $exito = $this->model->insertarUsuario(
        $nombre,
        $correo,
        $telefono,
        $direccion,
        $contrasena,
        $tipo_documento,
        $cargo,
        $identificacion,
        $foto
    );

    if ($exito) {
        $_SESSION['mensaje'] = ['texto' => 'Usuario registrado correctamente', 'tipo' => 'success'];
    } else {
        $_SESSION['mensaje'] = ['texto' => 'Error al registrar usuario', 'tipo' => 'danger'];
    }

    // Redirigir para mostrar el formulario y el mensaje
    header('Location: index.php');
    exit;
}
    
}