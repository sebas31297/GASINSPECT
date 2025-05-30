<?php
// App/Model/UsuarioModel.php

namespace App\Model;

use Config\Database;
use PDO;

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    /** Inserta un nuevo usuario */
    public function insertarUsuario(string $nombre, string $email, string $telefono,string $tipoDocumento, string $identificacion, string $dependencia, string $fechaIngreso,string $duracionContrato, string $tipoContrato, string $fotoPerfil ): bool
    {
        $sql  = "INSERT INTO usuarios (nombre_completo,email,telefono,tipo_documento, identificacion, dependencia, fecha_ingreso, duracion_contrato, tipo_contrato, foto_perfil) VALUES (:nombre, :email, :telefono, :tipoDocumento, :identificacion, :dependencia, :fechaIngreso, :duracionContrato, :tipoContrato, :fotoPerfil)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':tipoDocumento', $tipoDocumento);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':dependencia', $dependencia);
        $stmt->bindParam(':fechaIngreso', $fechaIngreso);
        $stmt->bindParam(':duracionContrato', $duracionContrato);
        $stmt->bindParam(':tipoContrato', $tipoContrato);
        $stmt->bindParam(':fotoPerfil', $fotoPerfil);
        return $stmt->execute();
    }
    /** Obtiene todos los usuarios */
    public function getUsuarios(): array
    {
        $sql  = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Elimina un usuario por su ID , opcion sin editar y confirmar*/
    public function eliminarUsuario(int $id): bool
    {
        $sql  = "DELETE FROM usuarios WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /** Obtiene un solo usuario por ID */
    public function getUsuarioById(int $id): ?array
    {
        $sql  = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /** Actualiza un usuario existente */
    public function actualizarUsuario(int $id, string $nombre, string $email, string $telefono,string $tipoDocumento, string $identificacion, string $dependencia, string $fechaIngreso,string $duracionContrato, string $tipoContrato, string $fotoPerfil ): bool
    {
        $sql  = "UPDATE usuarios
                 SET nombre_completo = :nombre,
                        email = :email,
                        telefono = :telefono,
                        tipo_documento = :tipoDocumento,
                        identificacion = :identificacion,
                        dependencia = :dependencia,
                        fecha_ingreso = :fechaIngreso,
                        duracion_contrato = :duracionContrato,
                        tipo_contrato = :tipoContrato,
                        foto_perfil = :fotoPerfil
                     
                 WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':tipoDocumento', $tipoDocumento);
        $stmt->bindParam(':dependencia', $dependencia);
        $stmt->bindParam(':fechaIngreso', $fechaIngreso);
        $stmt->bindParam(':duracionContrato', $duracionContrato);
        $stmt->bindParam(':tipoContrato', $tipoContrato);
        $stmt->bindParam(':fotoPerfil', $fotoPerfil);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
