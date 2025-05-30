<?php
// Config/database.php

namespace config;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";     // Dirección del servidor de la base de datos
    private $dbname = "gasinspect"; // Nombre de la base de datos
    private $username = "root";      // Usuario de la base de datos
    private $password = "deici26";          // Contraseña del usuario de la base de datos
    private $connection = null; // variable para almacenar la conexion PDO

    // Método para obtener la conexión
    public function getConnection(): PDO {
        if ($this->connection === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->exec("SET NAMES utf8");
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage()); // También puedes registrar o lanzar una excepción si quieres
            }
        }
        return $this->connection;
    }
}
?>