<?php
require_once __DIR__ . '/../controllers/VisitaController.php';

// Obtener inspectores para el dropdown (debes implementar esta función)
$inspectores = obtenerInspectores(); 

// Filtrar visitas solo si hay parámetros de búsqueda
$visitas = [];
if (!empty($_GET)) {
    $visitas = filtrarVisitas($_GET);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciones agendadas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!--enlace con biblioteca de iconos de bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-calendar/css/calendar.min.css" rel="stylesheet">
    <!-- Estilos CSS para bootstrap-calendar -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--boostrap-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--tipo de fuete google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!--enlace con fuente de letra estilo montserrat-->

    <!--estilos del navegador-->
    <link rel="stylesheet" href="../views/main.css">
    <!--estilos editados del boostrap-->
    <link rel="icon" type="image/x-icon"    href="../views/logo/logimag.png">

</head>

<body>

    <!--NAVEGAVOR ICONOS Y LOGO-->
    <div id="navbar"></div>
    

    <!--FIN NAVEGAVOR ICONOS Y LOGO-->

    <div class="row d-flex justify-content-center">
        <div
            class="col-md-11 p-3 d-flex justify-content-between aling-items-center border-bottom border-gris-oscuro border-2">
            <h2 class=" mt-1 text-success fw-semibold" id="tituloRegistro">Agenda</h2>
            <button class="btn btn-secondary " onclick="window.location.href='inicio.html'">Inicio</button>
            <!--encabezado, tamaño (h2)=32px, para titulos, color verde, peso de fuente (semibold)-->
        </div>
    </div>


    <div class="container-fluid mt-5 d-flex justify-content-center">
        <div class="row">
            <!-- Panel izquierdo: Lista de notificaciones -->
            <div class=" w-auto col-md-5 bg-gris-claro p-4 border border-2 border-azul-institucional rounded-3 ">

                <h5 class="text-azul-institucional fw-semibold">Inspecciones agendadas</h5>
                <p class="text-azul-institucional"> Lista de inspecciones. <br> Elija una de las inspecciones, de la mas
                    reciente a la mas antigua.</p>
                    <div class="list-group p-2 bg-white border-2 border border-gris-oscuro text-verde-institucional">
                        <?php if (empty($visitas)): ?>
                            <div class="text-center py-3 text-muted">
                                <?= empty($_GET) ? 'Ingrese criterios de búsqueda para ver inspecciones' : 'No se encontraron resultados' ?>
                            </div>

                            <?php else: ?>
                                <?php foreach ($visitas as $visita): ?>
                                    <button class="btn-inspeccion"  data-visita='<?= htmlspecialchars(json_encode($visita), ENT_QUOTES, 'UTF-8') ?>'>
                                        <?= htmlspecialchars($visita['nombre_cliente'] . " - " . $visita['fecha']) ?>
                                    </button>
                                <?php endforeach; ?>
                            <?php endif; ?>
</div>
    
    </div>

            <!-- Panel derecho: Contenido de la notificación -->
            <div class="w-auto col-md-7 bg-gris-claro p-4 border border-2 border-azul-institucional rounded-3">
                <div class="card">
                    <div class="card-header bg-light"> <!-- Opcional: Da mejor estructura -->
                        <h5 class="card-title fw-semibold text-azul-institucional" id="filtro-titulo">Filtro</h5>
                        <p class="text-azul-institucional">Ingrese los datos de la inspección que desea averiguar</p>
                    </div>
                    <form method="GET" action="inspectAgendadas.php" class="card-body">
                        <!-- Minicalendario filtro -->
                        <label for="fecha" class="form-label mt-3 text-azul-institucional">Fecha:</label>
                        <input type="date" class="form-control text-azul-institucional" id="fecha" name="fecha" value="<?= $_GET['fecha'] ?? '' ?>">

                        <!-- Etiqueta y desplegable para el  inspector -->
                        <label for="inspector" class="form-label mt-2 text-azul-institucional">Inspector:</label>
                        <select id="inspector" name="inspector" class="form-select">
                            <option value="">Seleccione...</option>
                                <?php foreach ($inspectores as $inspector): ?>
                                    <option value="<?= $inspector['id'] ?>" <?= ($_GET['inspector'] ?? '') == $inspector['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($inspector['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>

                        <!-- Etiqueta y desplegable para la busqueda -->
                        <label for="cedula" class="form-label mt-2 text-azul-institucional">Cedula del cliente:</label>
                        <input type="number" class="form-control text-azul-institucional" id="cedula" name="cedula"
                            value="<?= $_GET['cedula'] ?? '' ?>" placeholder="Ejemplo: 123">

                        <label for="contrato" class="form-label mt-2 text-azul-institucional">Numero de contrato:</label>
                        <input type="number" class="form-control text-azul-institucional" id="contrato" name="contrato"
                            value="<?= $_GET['contrato'] ?? '' ?>" placeholder="Ejemplo: 123">


                        <div class="d-flex justify-content-end">
                           <button type="submit" class="btn btn-azul-institucional text-white mt-5 ">Buscar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class=" mt-5  p-2 border-top border-2 text-center text-azul-institucional">
        © 2024 - GasInspect - Derechos reservados.
    </footer>

    <!-- Modal para Detalle de Inspección -->
<!-- Modal para Detalle de Inspección -->
<div class="modal fade" id="modalInspeccion" tabindex="-1" aria-labelledby="modalInspeccionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalInspeccionLabel">Detalle de la Inspección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" id="contenidoInspeccion">
        <!-- Contenido dinámico aquí -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btnEliminarInspeccion">Eliminar</button>
           <button type="button" class="btn btn-primary" id="btnEditarInspeccion">Editar</button>
        </div>
    </div>
  </div>
</div>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="nav.js"></script>
        <script src="inspeccionModal.js"></script>
</body>

</html>