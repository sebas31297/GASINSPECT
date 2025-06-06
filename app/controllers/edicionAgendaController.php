<?php
namespace controllers;

use models\VisitaModel;

class VisitaController {
    private VisitaModel $model;

    public function __construct() {
        $this->model = new VisitaModel();
    }

    /**
     * Listar todas las visitas y mostrar la vista
     */
    public function index() {
        $visitas = $this->model->getAll();
        require __DIR__ . '/../views/visitas/index.php';
    }

    /**
     * Mostrar y procesar formulario de edición
     */
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar actualización
            $data = array_merge($_POST, ['id_visita' => $_POST['id_visita']]);
            $this->model->update($data);
            header('Location: /path/to/inspect_agendadas.php');
            exit;
        }

        // GET: mostrar datos en el formulario
        $id = (int)($_GET['id'] ?? 0);
        $visita = $this->model->getById($id);
        require __DIR__ . '/../views/visitas/edit.php';
    }
}


// index.php (punto de entrada simple)
// Ejemplo de ruteo manual:
// if (isset($_GET['action']) && $_GET['action'] === 'edit') {
//     (new controllers\VisitaController())->edit();
// } else {
//     (new controllers\VisitaController())->index();
// }
