<?php
// App/Controller/UsuarioController.php

namespace App\Controller;

use App\Model\UsuarioModel;

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }
    /** Inserta un nuevo usuario */
    public function insertarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $tipoDocumento = $_POST['tipo_documento'] ?? '';
            $identificacion = $_POST['identificacion'] ?? '';
            $dependencia = $_POST['dependencia'] ?? '';
            $fechaIngreso = $_POST['fecha_ingreso'] ?? '';
            $duracionContrato = $_POST['duracion_contrato'] ?? '';
            $tipoContrato = $_POST['tipo_contrato'] ?? '';
            $fotoPerfil = $_FILES['foto_perfil']['name'] ?? '';

            // mueve la foto de perfil a una carpeta destino
            move_uploaded_file(
                $_FILES['foto_perfil']['tmp_name'],
                'fotos_perfil/' . $fotoPerfil);
            // Inserta el usuario en la base de datos
            $this->usuarioModel->insertarUsuario(
                $nombre,
                $email,
                $telefono,
                $tipoDocumento,
                $identificacion,
                $dependencia,
                $fechaIngreso,
                $duracionContrato,
                $tipoContrato,
                $fotoPerfil
            );
            // redirecciona a una pagina de éxito o a la lista de usuarios
            header('Location: /usuario_registrado.php');
            exit;
        }
    }
    /** lista todos los usuarios */
    public function listarUsuarios()
    {
        $usuarios = $this->usuarioModel->getUsuarios();
        // Renderiza la vista con la lista de usuarios
        include 'usuarios.php';
    }

    /** edita un usuario */
    public function editarUsuario(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $tipoDocumento = $_POST['tipo_documento'] ?? '';
            $identificacion = $_POST['identificacion'] ?? '';
            $dependencia = $_POST['dependencia'] ?? '';
            $fechaIngreso = $_POST['fecha_ingreso'] ?? '';
            $duracionContrato = $_POST['duracion_contrato'] ?? '';
            $tipoContrato = $_POST['tipo_contrato'] ?? '';
            $fotoPerfil = $_FILES['foto_perfil']['name'] ?? '';

            // actualiza el usuario en la base de datos
            $this->usuarioModel->actualizarUsuario(
                $id,
                $nombre,
                $email,
                $telefono,
                $tipoDocumento,
                $identificacion,
                $dependencia,
                $fechaIngreso,
                $duracionContrato,
                $tipoContrato,
                $fotoPerfil
            );
            // redirecciona a una pagina de éxito o a la lista de usuarios
            header('Location: /usuario_actualizado.php');
            exit;
        } else {
            // Obtiene el usuario por ID
            $usuario = $this->usuarioModel->getUsuarioById($id);
            // Renderiza la vista de edición con el formulkario de edicion
            include 'editar_usuario.php';
        }
    }
    /** Elimina un usuario */
    public function eliminarUsuario(int $id)
    {
        $this->usuarioModel->eliminarUsuario($id);
        // Redirecciona a una pagina de éxito o a la lista de usuarios
        header('Location: usuarios.php');
        exit;
    }

}
