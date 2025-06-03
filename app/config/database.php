<?php
// Config/database.php

namespace config; //la clase creada o definida se asociará a la carpeta config

use PDO; //uso de la clase estandar PDO para conectar con bases de datos en php
use PDOException; //uso de la clase estandar para capturar errores especificos en PDO

class Database { //definiciín de la clase para la coneccion con la base de datos
    private $host = "localhost";      //direccion del servidor de la base de datos
    private $db_name = "gasinspect"; // <--nombre de la BD a conectar
    private $username = "root";     // <-- usuario de acceso a la BD. Cambiar si usa otro usuario
    private $password = "MINOMBRE";        // <-- contraseña si la hay
    private $connection= null;         //variable que almacenará la instancia de conexion en PDO

    public function getConnection(): PDO { //conexion publica, que puede ser llamada por otras partes de codigo de dieferentes carpetas del proyecto
        if ($this->connection === null) {    //limpia la variable connection para que esté vacía antes de una nueva conexion
        try {  //intento de establecer conexion con la BD
             $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8"; //creación de un una instancia de PDO que representa la conexión activa con la base de datos
                                  $this->connection = new PDO($dsn, $this->username, $this->password); //credencial para acceder a la bd ubicada en el host
                                  $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //credencial para acceder a la bd ubicada en el host
            $this->connection->exec("set names utf8"); //interprete de caracteres utf8, que puede leer los datos del usuario y almacenarlos en la BD correctamente

        } catch(PDOException $e) { //captura de errores PDO, durante la conexion a una BD
            die ("Error de conexión: " . $e->getMessage()); //mensaje de error si la conexion falla
        }
    }
        return $this->connection; //devuelve a la conexion establecida o a null si no se pudo establecer
    }
}