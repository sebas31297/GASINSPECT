<?php
namespace app\controllers;


require_once '../app/models/UsuarioModel.php'; 



use app\models\UsuarioModel;


class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioModel();
    }
                                        //registrar Usuario
    public function mostrarFormularioRegistro()
    {
         require_once __DIR__ . '/../views/registroUsuario.php';
    }

   public function registrarUsuario(array $datos) : void
    {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
        }
        // Validar si ya existe la identificación
        if ($this->model->existeIdentificacion($datos['identificacion'])) {
        $_SESSION['mensaje'] = ['texto' => 'Ya existe un usuario con esa identificación.', 'tipo' => 'danger'];
        header('Location: ../app/views/registroUsuario.php');
        exit;
        }

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
    
    public function mostrarFormularioEditarPerfil()
    {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Suponiendo que tienes el ID del usuario en sesión
    $id_usuario = $_SESSION['id_usuario'] ?? null;

    if (!$id_usuario) {
        // Si no hay usuario logueado, redirige o muestra error
        header('Location: index.php?action=formulario');
        exit;
    }

    // Obtener datos del usuario por ID
    $usuario = $this->model->obtenerUsuarioPorId($id_usuario);

    if (!$usuario) {
        // Usuario no encontrado
        header('Location: index.php?action=formulario');
        exit;
    }

    // Incluir vista del formulario de edición con los datos cargados
    include __DIR__ . '/../views/EditarPerfil.php';
    }
    //obtener usuario por ID
    public function obtenerUsuarioPorId(int $id): ?array
    {
        return $this->model->obtenerUsuarioPorId($id);
    }
                                            // edicionPerfil
    public function actualizarUsuario(array $datos): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id_usuario = isset($datos['id_usuario']) ? (int)$datos['id_usuario'] : 0;
        $nombre = $datos['nombre_usuario'] ?? '';
        $correo = $datos['correo'] ?? '';
        $telefono = $datos['telefono'] ?? '';
        $direccion = $datos['direccion'] ?? '';
        $contrasena = $datos['contrasena'] ?? '';
        $tipo_documento = isset($datos['id_tipo_documento']) ? (int)$datos['id_tipo_documento'] : null;
        $cargo = isset($datos['id_cargo']) ? (int)$datos['id_cargo'] : null;
        $identificacion = $datos['identificacion'] ?? '';
        $foto = null; // O manejar la subida si es necesario

        $exito = $this->model->actualizarUsuario(
            $id_usuario,
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
            $_SESSION['mensaje'] = ['texto' => 'Perfil actualizado correctamente', 'tipo' => 'success'];
        } else {
            $_SESSION['mensaje'] = ['texto' => 'Error al actualizar perfil', 'tipo' => 'danger'];
        }

    // Redirige de vuelta al formulario de edición
        header('Location: EditarPerfil.php');
        exit;
    }
}
