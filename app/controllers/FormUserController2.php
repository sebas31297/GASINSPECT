<?php
//inclusión de modelos para obtener las opciones que brindan los Select dinamicos desde la BD
require_once __DIR__ . '/../models/TipoDocumentoModel.php';
require_once __DIR__ . '/../models/TipoCargoModel.php';


//instanciar cada modelo para poder obtener sus datos
$tipoDocumentoModel = new TipoDocumentoModel();
$tipoCargoModel = new TipoCargoModel();

//definir los metodos para extraer datos de la BD
$documentos = $tipoDocumentoModel->obtenerTodos();
$cargos = $tipoCargoModel->obtenerTodos();

// Cargar las opciones en los select de la vista 
require_once __DIR__. '/../views/EditarPerfil.php';