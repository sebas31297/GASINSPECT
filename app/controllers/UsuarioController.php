<?php
namespace app\controllers;


require_once '../app/models/UsuarioModel.php'; 
require_once __DIR__ . '/../models/TipoDocumentoModel.php';
require_once __DIR__ . '/../models/TipoCargoModel.php';



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
    
    public function mostrarFormularioEditarPerfil():void
    {
    if (!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])) {
            die('Error: debes indicar el parametro id_usuario en la URL');
        }
        $id = intval($_GET['id_usuario']);

        // Obtener datos del usuario
        $usuario = $this->model->obtenerUsuarioPorId($id);
        if (!$usuario) {
            die("Error: No existe ningún usuario con ID = $id");
        }
        // 2) Delegar la carga de $documentos, $cargos y la vista
        //    a FormUserController2.php (que a su vez incluirá EditarPerfil.php)
        require_once __DIR__ . '/FormUserController2.php';
    }   

    public function actualizarUsuario(array $datos, array $files): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($datos['id_usuario']) || empty($datos['id_usuario'])) {
            die('Error: No se recibió el ID de usuario para actualizar');
        }
        $id = intval($datos['id_usuario']);

        $nombre         = $datos['nombre_usuario'] ?? '';
        $correo         = $datos['correo'] ?? '';
        $telefono       = $datos['telefono'] ?? '';
        $direccion      = $datos['direccion'] ?? '';
        $contrasena     = $datos['contrasena'] ?? '';
        $identificacion = $datos['identificacion'] ?? '';
        $tipo_documento = isset($datos['id_tipo_documento']) ? intval($datos['id_tipo_documento']) : null;
        $cargo          = isset($datos['id_cargo']) ? intval($datos['id_cargo']) : null;

        $nombreFoto = null; 
        if (isset($files['foto']) && $files['foto']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $files['foto']['tmp_name'];
            $ext     = pathinfo($files['foto']['name'], PATHINFO_EXTENSION);
            $nombreFoto = 'usuario_' . $id . '_' . time() . '.' . $ext;
            $destino = __DIR__ . '/../uploads/' . $nombreFoto;
            if (!move_uploaded_file($tmpPath, $destino)) {
                $_SESSION['mensaje'] = ['texto' => 'No se pudo subir la foto de perfil', 'tipo' => 'warning'];
            }
        }
    
        $exito = $this->model->actualizarUsuario(
            $id,
            $nombre,
            $correo,
            $telefono,
            $direccion,
            $contrasena,
            $tipo_documento,
            $cargo,
            $identificacion,
            $nombreFoto
        );

        if ($exito) {
            $_SESSION['mensaje'] = ['texto' => 'Perfil actualizado correctamente', 'tipo' => 'success'];
        } else {
            $_SESSION['mensaje'] = ['texto' => 'Hubo un problema al actualizar el perfil', 'tipo' => 'danger'];
        }
        header("Location: index.php?action=editarPerfil&id_usuario=$id");
        exit;
    }
    public function eliminarUsuario():void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])) {
            die('Error: Falta el ID de usuario para eliminar.');
        }
        $id = intval($_GET['id_usuario']);
        $exito = $this->model->eliminarUsuario($id);
        if ($exito) {
            $_SESSION['mensaje'] = ['texto' => 'Usuario eliminado correctamente', 'tipo' => 'success'];
        } else {
            $_SESSION['mensaje'] = ['texto' => 'Hubo un problema al eliminar el usuario', 'tipo' => 'danger'];
        }
            // despues de eliminar, cerramos la sesion y dirigimos al login 
            session_unset();
            session_destroy();
            header('Location: index.php?action=login');
            exit;
    }
} 

