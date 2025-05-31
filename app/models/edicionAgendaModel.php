<?php

// models/VisitaModel.php
namespace models;

use config\Database;
use PDO;

class VisitaModel {
    private PDO $db;

    public function __construct() {
        // Obtener conexión PDO
        $this->db = (new Database())->getConnection();
    }

    /**
     * Obtener todas las visitas agendadas
     * @return array
     */
    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM visita ORDER BY fecha DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener una visita por su ID
     * @param int $id
     * @return array|false
     */
    public function getById(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM visita WHERE id_visita = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualizar una visita existente
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool {
        $sql = "UPDATE visita SET
                identificacion      = :identificacion,
                nombre_cliente      = :nombre_cliente,
                telefono            = :telefono,
                direccion           = :direccion,
                fecha               = :fecha,
                numero_contrato     = :numero_contrato,
                valor_revicion      = :valor_revision,
                id_tipo_documento   = :id_tipo_documento,
                id_depto            = :id_depto,
                id_mupio            = :id_mupio,
                id_distribuidora    = :id_distribuidora,
                id_tipo_gas         = :id_tipo_gas,
                id_tipo_instalacion = :id_tipo_instalacion,
                id_tipo_servicio    = :id_tipo_servicio,
                observaciones       = :observaciones,
                id_estado           = :id_estado
            WHERE id_visita = :id_visita";
        $stmt = $this->db->prepare($sql);
        // Mapear parámetros
        return $stmt->execute([
            ':identificacion'       => $data['identificacion'],        
            ':nombre_cliente'       => $data['nombre_cliente'],
            ':telefono'             => $data['telefono'],
            ':direccion'            => $data['direccion'],
            ':fecha'                => $data['fecha'],
            ':numero_contrato'      => $data['numero_contrato'],
            ':valor_revision'       => $data['valor_revision'],
            ':id_tipo_documento'    => $data['id_tipo_documento'],        
            ':id_depto'             => $data['id_depto'],
            ':id_mupio'             => $data['id_mupio'],
            ':id_distribuidora'     => $data['id_distribuidora'],
            ':id_tipo_gas'          => $data['id_tipo_gas'],
            ':id_tipo_instalacion'  => $data['id_tipo_instalacion'],
            ':id_tipo_servicio'     => $data['id_tipo_servicio'],
            ':observaciones'        => $data['observaciones'],
            ':id_estado'            => $data['id_estado'],
            ':id_visita'            => $data['id_visita'],
        ]);
    }
}