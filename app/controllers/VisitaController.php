<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../models/VisitaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['action']) && $_POST['action'] == 'eliminar') {
        header('Content-Type: application/json');
        
        try {
            
            $visitaModel = new VisitaModel();

            $id_visita = $_POST['id_visita'] ?? null;

           if (empty($_POST['id_visita'])) {
           throw new Exception('ID de visita no proporcionado');
           }

            
            if (!$id_visita) {
                throw new Exception('ID de visita no proporcionado');
            }
            
            if ($visitaModel->eliminarVisita($id_visita)) {
                echo json_encode(['success' => true, 'message' => 'Visita eliminada correctamente']);
            } else {
                throw new Exception('No se pudo eliminar la visita');
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }

    $visitaModel = new VisitaModel();
    // Preparar los datos para la inserción/actualización
    $datos = [
        ':identificacion' => $_POST['identificacion'],
        ':nombre_cliente' => $_POST['nombre_cliente'],
        ':telefono' => $_POST['telefono'],
        ':direccion' => $_POST['direccion'],
        ':fecha' => $_POST['fecha'],
        ':numero_contrato' => $_POST['numero_contrato'],
        ':valor_revicion' => $_POST['valor_revicion'],
        ':id_tipo_documento' => $_POST['id_tipo_documento'],
        ':id_depto' => $_POST['id_depto'],
        ':id_mupio' => $_POST['id_mupio'] ?? null,
        ':id_distribuidora' => $_POST['id_distribuidora'],
        ':id_tipo_gas' => $_POST['id_tipo_gas'],
        ':id_tipo_instalacion' => $_POST['id_tipo_instalacion'],
        ':id_tipo_servicio' => $_POST['id_tipo_servicio'],
        ':observaciones' => $_POST['observaciones'],
        ':id_estado' => $_POST['id_estado'],
        ':id_usuario' => null // Temporal hasta autenticación
    ];

    // Detectar si es edición (si se está enviando un id_visita)
    $id_visita = $_POST['id_visita'] ?? null;

    if ($id_visita) {
        // Actualizar visita existente
        if ($visitaModel->actualizarVisita($id_visita, $datos)) {
            header("Location: ../VIEWS/inspectAgendadas.php");
            exit;
        } else {
            echo "Error al actualizar la visita.";
        }
    } else {
        // Registrar nueva visita
        if ($visitaModel->registrarVisita($datos)) {
            header("Location: ../VIEWS/inspectAgendadas.php");
            exit;
        } else {
            echo "Error al registrar la visita.";
        }
    }
}

// Métodos para consultas
function listarVisitas() {
    $visitaModel = new VisitaModel();
    return $visitaModel->obtenerTodasLasVisitas();
}

function filtrarVisitas($filtros) {
    $visitaModel = new VisitaModel();
    return $visitaModel->filtrarVisitas($filtros);
}

function obtenerInspectores() {
    $visitaModel = new VisitaModel();
    return $visitaModel->obtenerInspectores();
}
?>