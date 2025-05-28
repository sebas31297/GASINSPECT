<?php  //contenido php
require_once __DIR__ . '/../config/database.php'; //inclusión del archivo database.php de la carpeta "config" en donde se guardará la informacion
use config\Database;  //uso de la clase Database que está dentro del namespace "config" ubicados en "config/database.php"


class DistribuidoraModel { //creacion de la clase que interactuará con la tabla tipo_documento de la BD 
    private $db; //declaracion de un atributo privado llamado "conn" dentro de la clase. guardará la instancia de conexion

    public function __construct() { //metodo constructor para inicializar las propiedades de la clase "Database" en la instancia creada
        $database = new Database();  //crea una nueva instancia (copia) de la clase Database y la guarda en la variable "$database"
        $this->db = $database->getConnection(); //llama al metodo "getconnection" de la instancia "$database" y guarda la conexion en el atributo privado "conn"  
    }

    public function obtenerTodos() { //define un metodo publico para sustraer los datos de la tabla tipo_documento
        $stmt = $this->db->query("SELECT*FROM distribuidora"); //declaración que prepara la consulta SQL para extraer datos de la BD
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //devuelve los datos solicitados en la consulta SQL
    }
}