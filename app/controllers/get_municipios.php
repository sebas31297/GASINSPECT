<?php
require_once __DIR__ . '/../models/MupioModel.php';

header('Content-Type: application/json');

try {
    // Validación más robusta del parámetro
    $id_depto = filter_input(INPUT_GET, 'id_depto', FILTER_VALIDATE_INT);
    
    if ($id_depto === false || $id_depto <= 0) {
        throw new InvalidArgumentException('ID de departamento inválido');
    }

    $model = new MupioModel();
    $municipios = $model->obtenerPorDepto($id_depto);

    // Validar que se obtuvieron resultados
    if (empty($municipios)) {
        throw new RuntimeException('No se encontraron municipios para este departamento');
    }

    echo json_encode([
        'success' => true,
        'data' => $municipios
    ]);

} catch (InvalidArgumentException $e) {
    http_response_code(400); // Bad Request
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
} catch (RuntimeException $e) {
    http_response_code(404); // Not Found
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode([
        'success' => false,
        'error' => 'Error interno del servidor'
    ]);
}