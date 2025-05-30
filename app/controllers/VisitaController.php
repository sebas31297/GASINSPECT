<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../models/VisitaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $visitaModel = new VisitaModel();

    // Verificar si 'id_mupio' está presente en el formulario
    $id_mupio = isset($_POST['id_mupio']) ? $_POST['id_mupio'] : null;

    // Preparar los datos para la inserción
    $datos = [
        ':identificacion' => $_POST['identificacion'],
        ':nombre_cliente' => $_POST['nombre_cliente'],
        ':telefono' => $_POST['telefono'],
        ':direccion' => $_POST['direccion'],
        ':fecha' => $_POST['fecha'],
        ':numero_contrato' => $_POST['numero_contrato'],
        ':valor_revicion' => $_POST['valor_revision'],
        ':id_tipo_documento' => $_POST['id_tipo_documento'],
        ':id_depto' => $_POST['id_depto'],
        ':id_mupio' => $id_mupio,
        ':id_distribuidora' => $_POST['id_distribuidora'],
        ':id_tipo_gas' => $_POST['id_tipo_gas'],
        ':id_tipo_instalacion' => $_POST['id_tipo_instalacion'],
        ':id_tipo_servicio' => $_POST['id_tipo_servicio'],
        ':observaciones' => $_POST['observaciones'],
        ':id_estado' => $_POST['id_estado'],
        ':id_usuario' => null // Asignación temporal hasta implementar autenticación
    ];

    // Intentar registrar la visita
    if ($visitaModel->registrarVisita($datos)) {
        header("Location: ../VIEWS/agenda.html");
        exit;
    } else {
        echo "Error al registrar la visita.";
    }
}
?>
