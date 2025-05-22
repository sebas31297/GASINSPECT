<?php  //contenido php
require_once __DIR__ . '/../config/database.php'; //inclusión del archivo database.php de la carpeta "config"
use config\Database;  //uso de la clase Database que está dentro del namespace "config" ubicados en "config/database.php"


class VisitaModel { //creacion de la clase VisitaModel que iteractuará con la BD para registrar las visitas
    private $conn; //declaracion de un atributo privado llamado "conn" dentro de la clase "VisitaModel". guardará la instancia de conexion

    public function __construct() { //metodo constructor para inicializar las propiedades de la clase "Database" en la instancia creada
        $database = new Database();  //crea una nueva instancia (copia) de la clase Database y la guarda en la variable "$database"
        $this->conn = $database->getConnection(); //llama al metodo "getconnection" de la instancia "$database" y guarda la conexion en el atributo privado "conn"  
    }

    public function registrarVisita($datos) { //define un metodo publico llamado "registroavisita" con una variable de entrada llamada $datos
        // Se define una consulta SQL (query) para insertar un nuevo registro en la tabla 'visita'.
        // Esta consulta será enviada a la base de datos a través de PHP usando PDO.
        $query = "INSERT INTO visita ( 
            identificacion, nombre_cliente, telefono, direccion, fecha, numero_contrato, valor_revicion,
            id_tipo_documento, id_depto, id_mupio, id_distribuidora, id_tipo_gas, id_tipo_instalacion,
            id_tipo_servicio, observaciones, id_estado, id_usuario
        ) VALUES (
            :identificacion, :nombre_cliente, :telefono, :direccion, :fecha, :numero_contrato, :valor_revicion,
            :id_tipo_documento, :id_depto, :id_mupio, :id_distribuidora, :id_tipo_gas, :id_tipo_instalacion,
            :id_tipo_servicio, :observaciones, :id_estado, :id_usuario
        )";

        $stmt = $this->conn->prepare($query); //metodo que prepara la consulta con marcadores
        return $stmt->execute($datos); //metodo de ejecucion, que ejecuta la consulta con los datos del usuario y guarda los datos del usuario
    }
}