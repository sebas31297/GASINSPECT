<?php
namespace app\models; // app/models/UsuarioModel.php

use config\Database;
use PDO;

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    /** Inserta un nuevo usuario */
        public function insertarUsuario(string $nombre, string $correo, string $telefono, string $direccion, string $contrasena, ?int $tipo_documento, ?int $cargo, string $identificacion, ?string $foto): bool
        {
         $sql = "INSERT INTO usuario (nombre_usuario, correo, telefono, direccion, contrasena, id_tipo_documento, id_cargo, identificacion, foto)
                 VALUES (:nombre_usuario, :correo, :telefono, :direccion, :contrasena, :id_tipo_documento, :id_cargo, :identificacion, :foto)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre_usuario', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->bindParam(':id_tipo_documento', $tipo_documento, PDO::PARAM_INT);
            $stmt->bindParam(':id_cargo', $cargo, PDO::PARAM_INT);
            $stmt->bindParam(':identificacion', $identificacion);
            $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
            return $stmt->execute();
        }
    /** Obtiene todos los usuarios */
        public function getUsuarios(): array
        {
            $sql  = "SELECT * FROM usuario";
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
            $sql  = "SELECT * FROM usuario WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ?: null;
        }

    /** Actualiza un usuario existente */
        public function actualizarUsuario(int $id, string $nombre, string $correo, string $telefono, string $direccion, string $contrasena, ?int $tipo_documento, ?int $cargo, string $identificacion, ?string $foto ): bool
        {
            $sql  = "UPDATE usuario
                    SET nombre_usuario = :nombre,
                        correo = :correo,
                        telefono = :telefono,
                        direccion = :direccion,
                        contrasena = :contrasena,
                        id_tipo_documento = :tipoDocumento,
                        identificacion = :identificacion,
                        id_cargo = :cargo,    
                        foto= :foto
                     
                    WHERE id_usuario = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':contrasena', $contrasena);        
            $stmt->bindParam(':tipoDocumento', $tipo_documento, PDO::PARAM_INT);
            $stmt->bindParam(':identificacion', $identificacion);
            $stmt->bindParam(':cargo', $cargo, PDO::PARAM_INT);      
            $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
}
 