<?php  //contenido php
require_once __DIR__ . '/../config/database.php'; //inclusión del archivo database.php de la carpeta "config"
use config\Database;  //uso de la clase Database que está dentro del namespace "config" ubicados en "config/database.php"


class VisitaModel { //creacion de la clase VisitaModel que iteractuará con la BD para registrar las visitas
    private $db; //declaracion de un atributo privado llamado "conn" dentro de la clase "VisitaModel". guardará la instancia de conexion

    public function __construct() { //metodo constructor para inicializar las propiedades de la clase "Database" en la instancia creada
        $database = new Database();  //crea una nueva instancia (copia) de la clase Database y la guarda en la variable "$database"
        $this->db = $database->getConnection(); //llama al metodo "getconnection" de la instancia "$database" y guarda la conexion en el atributo privado "conn"  
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

        $stmt = $this->db->prepare($query); //metodo que prepara la consulta con marcadores
        return $stmt->execute($datos); //metodo de ejecucion, que ejecuta la consulta con los datos del usuario y guarda los datos del usuario
    }

//metodo para determinar una identificacion ya existente
    public function existeIdentificacion($identificacion, $id_visita = null) {
    $query = "SELECT COUNT(*) FROM visita WHERE identificacion = :identificacion";
    if ($id_visita) {
        $query .= " AND id_visita != :id_visita";
    }

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':identificacion', $identificacion);
    if ($id_visita) {
        $stmt->bindParam(':id_visita', $id_visita);
    }
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

//metodo para determinar contratos ya existentes
public function existeNumeroContrato($numero_contrato, $id_visita = null) {
    $query = "SELECT COUNT(*) FROM visita WHERE numero_contrato = :numero_contrato";
    if ($id_visita) {
        $query .= " AND id_visita != :id_visita";
    }

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':numero_contrato', $numero_contrato);
    if ($id_visita) {
        $stmt->bindParam(':id_visita', $id_visita);
    }
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

//metodo publico para obtener las inspecciones registradas
    public function obtenerTodasLasVisitas() {
    $query = "SELECT v.*, 
                     td.tipo_documento,
                     d.depto AS nombre_depto,
                     m.mupio AS nombre_mupio,
                     dis.distribuidora,
                     tg.tipo_gas,
                     ti.tipo_instalacion,
                     ts.tipo_servicio,
                     e.tipo_estado
              FROM visita v
              LEFT JOIN tipo_documento td ON v.id_tipo_documento = td.id_tipo_documento
              LEFT JOIN depto d ON v.id_depto = d.id_depto
              LEFT JOIN mupio m ON v.id_mupio = m.id_mupio
              LEFT JOIN distribuidora dis ON v.id_distribuidora = dis.id_distribuidora
              LEFT JOIN tipo_gas tg ON v.id_tipo_gas = tg.id_tipo_gas
              LEFT JOIN tipo_instalacion ti ON v.id_tipo_instalacion = ti.id_tipo_instalacion
              LEFT JOIN tipo_servicio ts ON v.id_tipo_servicio = ts.id_tipo_servicio
              LEFT JOIN estado e ON v.id_estado = e.id_estado
              ORDER BY v.fecha DESC";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//metodo para poder filtrar los datos según elrequerimiento
public function filtrarVisitas($filtros) {

     $query = "SELECT v.*, 
                     td.tipo_documento,
                     d.depto AS nombre_depto,
                     m.mupio AS nombre_municipio,
                     dis.distribuidora AS nombre_distribuidora,
                     tg.tipo_gas AS nombre_tipo_gas,
                     ti.tipo_instalacion AS nombre_instalacion,
                     ts.tipo_servicio AS nombre_servicio,
                     e.tipo_estado AS nombre_estado
              FROM visita v
              LEFT JOIN tipo_documento td ON v.id_tipo_documento = td.id_tipo_documento
              LEFT JOIN depto d ON v.id_depto = d.id_depto
              LEFT JOIN mupio m ON v.id_mupio = m.id_mupio
              LEFT JOIN distribuidora dis ON v.id_distribuidora = dis.id_distribuidora
              LEFT JOIN tipo_gas tg ON v.id_tipo_gas = tg.id_tipo_gas
              LEFT JOIN tipo_instalacion ti ON v.id_tipo_instalacion = ti.id_tipo_instalacion
              LEFT JOIN tipo_servicio ts ON v.id_tipo_servicio = ts.id_tipo_servicio
              LEFT JOIN estado e ON v.id_estado = e.id_estado
              WHERE 1=1";

    $params = [];

    if (!empty($filtros['fecha'])) {
        $query .= " AND v.fecha = :fecha";
        $params[':fecha'] = $filtros['fecha'];
    }
    if (!empty($filtros['cedula'])) {
        $query .= " AND v.identificacion = :cedula";
        $params[':cedula'] = $filtros['cedula'];
    }
    if (!empty($filtros['contrato'])) {
        $query .= " AND v.numero_contrato = :contrato";
        $params[':contrato'] = $filtros['contrato'];
    }
    if (!empty($filtros['inspector'])) {
        $query .= " AND v.id_usuario = :inspector";
        $params[':inspector'] = $filtros['inspector'];
    }

    $query .= " ORDER BY v.fecha DESC";
    $stmt = $this->db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function obtenerInspectores() {
    $query = "SELECT id_usuario AS id, nombre_usuario AS nombre FROM usuario WHERE id_cargo = 4"; // Ajusta el rol/cargo según tu lógica
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//metodos para la edicion de una inspeccion agendada

public function obtenerVisitaPorId($id) {
    $stmt = $this->db->prepare("SELECT * FROM visita WHERE id_visita = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}




public function actualizarVisita($id_visita, $datos) {
    $query = "UPDATE visita SET 
        identificacion = :identificacion,
        nombre_cliente = :nombre_cliente,
        telefono = :telefono,
        direccion = :direccion,
        fecha = :fecha,
        numero_contrato = :numero_contrato,
        valor_revicion = :valor_revicion,
        id_tipo_documento = :id_tipo_documento,
        id_depto = :id_depto,
        id_mupio = :id_mupio,
        id_distribuidora = :id_distribuidora,
        id_tipo_gas = :id_tipo_gas,
        id_tipo_instalacion = :id_tipo_instalacion,
        id_tipo_servicio = :id_tipo_servicio,
        observaciones = :observaciones,
        id_estado = :id_estado,
        id_usuario = :id_usuario
        WHERE id_visita = :id_visita";

    $stmt = $this->db->prepare($query);

    // Agrega el id_visita a los datos
    $datos[':id_visita'] = $id_visita;

    return $stmt->execute($datos);
}



}