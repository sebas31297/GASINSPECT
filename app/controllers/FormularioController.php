<?php
//inclusión de modelos para obtener las opciones que brindan los Select dinamicos desde la BD
require_once __DIR__ . '/../models/TipoDocumentoModel.php';
require_once __DIR__ . '/../models/DeptoModel.php';
require_once __DIR__ . '/../models/MupioModel.php';
require_once __DIR__ . '/../models/DistribuidoraModel.php';
require_once __DIR__ . '/../models/TipoGasModel.php';
require_once __DIR__ . '/../models/TipoInstalacionModel.php';
require_once __DIR__ . '/../models/TipoServicioModel.php';
require_once __DIR__ . '/../models/EstadoModel.php';

//instanciar cada modelo para poder obtener sus datos
$tipoDocumentoModel = new TipoDocumentoModel();
$deptoModel = new DeptoModel();
$mupioModel = new MupioModel();
$distribuidoraModel = new DistribuidoraModel();
$tipoGasModel = new TipoGasModel();
$tipoInstalacionModel = new TipoInstalacionModel();
$tipoServicioModel = new TipoServicioModel();
$estadoModel = new EstadoModel();

//definir los metodos para extraer datos de la BD
$documentos = $tipoDocumentoModel->obtenerTodos();
$departamentos = $deptoModel->obtenerTodos();
$municipios = $mupioModel->obtenerTodos();
$distribuidoras = $distribuidoraModel->obtenerTodos();
$tiposGas = $tipoGasModel->obtenerTodos();
$tiposInstalacion = $tipoInstalacionModel->obtenerTodos();
$tiposServicio = $tipoServicioModel->obtenerTodos();
$estados = $estadoModel->obtenerTodos();

// Cargar las opciones en los select de la vista 
require_once __DIR__ . '/../views/registroInspeccion.php';