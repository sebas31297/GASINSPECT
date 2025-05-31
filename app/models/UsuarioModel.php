<?php
<<<<<<< HEAD
namespace app\models; // app/models/UsuarioModel.php

use config\Database;
=======
// app/models/UsuarioModel.php

namespace app\models;
require_once __DIR__ . '/../config/Database.php';
use config\Database;

>>>>>>> f76e45cae771fd4c2c43bb0366bef49267f06416
use PDO;

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    /** Inserta un nuevo usuario */
<<<<<<< HEAD
    
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
         /** Verifica si ya existe una identificación registrada */
    public function existeIdentificacion(string $identificacion): bool
    {
        $sql = "SELECT COUNT(*) FROM usuario WHERE identificacion = :identificacion";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':identificacion', $identificacion, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
=======

    public function insertarUsuario(
        string $nombre_usuario,
        string $correo,
        string $telefono,
        int $id_tipo_documento,
        string $identificacion,
        string $direccion,
        int $id_cargo,
        string $contrasena,
        string $foto
    ): bool
    {
        $sql = "INSERT INTO usuario (nombre_usuario, correo, telefono, id_tipo_documento, identificacion, direccion, id_cargo, contrasena, foto)
                VALUES (:nombre_usuario, :correo, :telefono, :id_tipo_documento, :identificacion, :direccion, :id_cargo, :contrasena, :foto)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id_tipo_documento', $id_tipo_documento, PDO::PARAM_INT);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':id_cargo', $id_cargo, PDO::PARAM_INT);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':foto', $foto);
        return $stmt->execute();
    }

    /** Obtiene todos los usuarios */
    public function getUsuarios(): array
    {
        $sql = "SELECT * FROM usuario";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Elimina un usuario por su ID */
    public function eliminarUsuario(int $id): bool
    {
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
>>>>>>> f76e45cae771fd4c2c43bb0366bef49267f06416
    }
   

    /** Obtiene un solo usuario por ID */
<<<<<<< HEAD

        public function obtenerUsuarioPorId(int $id): ?array
        {
            $sql  = "SELECT * FROM usuario WHERE id_usuario = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ?: null;
        }

    /** Actualiza un usuario existente */
                public function actualizarUsuario(
            int $id_usuario,
            string $nombre,
            string $correo,
            string $telefono,
            string $direccion,
            string $contrasena,
            ?int $tipo_documento,
            ?int $cargo,
            string $identificacion,
            ?string $foto
        ): bool {
            $sql = "UPDATE usuario SET
                        nombre_usuario = :nombre_usuario,
                        correo = :correo,
                        telefono = :telefono,
                        direccion = :direccion,
                        contrasena = :contrasena,
                        id_tipo_documento = :id_tipo_documento,
                        id_cargo = :id_cargo,
                        identificacion = :identificacion,
                        foto = :foto
                    WHERE id_usuario = :id_usuario";

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
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

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
}
 
=======
    public function getUsuarioById(int $id): ?array
    {
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /** Actualiza un usuario existente */

    public function actualizarUsuario(
        int $id,
        string $nombre_usuario,
        string $correo,
        string $telefono,
        int $id_tipo_documento,
        string $identificacion,
        string $direccion,
        int $id_cargo,
        string $contrasena,
        string $foto
    ): bool
    {
        $sql = "UPDATE usuario
                SET nombre_usuario = :nombre_usuario,
                    correo = :correo,
                    telefono = :telefono,
                    id_tipo_documento = :id_tipo_documento,
                    identificacion = :identificacion,
                    direccion = :direccion,
                    id_cargo = :id_cargo,
                    contrasena = :contrasena,
                    foto = :foto
                WHERE id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id_tipo_documento', $id_tipo_documento, PDO::PARAM_INT);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':id_cargo', $id_cargo, PDO::PARAM_INT);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /** Obtiene un usuario por su correo (para login) */
    public function getUsuarioPorEmail(string $correo): ?array
    {
        $sql = "SELECT * FROM usuario WHERE correo = :correo LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario ?: null;
    }

}
>>>>>>> f76e45cae771fd4c2c43bb0366bef49267f06416
