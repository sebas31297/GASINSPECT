<?php
require_once __DIR__ . '/../models/MupioModel.php';

header('Content-Type: application/json');

if (isset($_GET['id_depto'])) {
    $id_depto = intval($_GET['id_depto']);

    $model = new MupioModel();
    $municipios = $model->obtenerPorDepto($id_depto);

    echo json_encode($municipios);
} else {
    echo json_encode([]);
}
