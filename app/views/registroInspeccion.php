<?php require_once __DIR__ . '/../controllers/formularioController.php'; ?> <!--inclusión del controlador formularioController.php para que prepare los datos que el formulario necesitará-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de inspección</title><!--titulo de la pestaña-->


    <link rel="icon" href="../views/logo/logimag.png" type="image/x-icon">
    <!--link para añadir icono de la empresa en la pestaña de la pagina web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--link de bootstrap-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!--enlace con fuente de letra estilo montserrat-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!--enlace con biblioteca de iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--link ´pára los iconos de font awesome-->
    <link rel="stylesheet" href="../views/main.css"><!--enlace de estilos css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--link ´pára los iconos de font awesome-->





</head>


<body class="mod-registroInspeccion">
    <!--ENCABEZADO DE PAGINA-->
    
    <!--NAVEGAVOR ICONOS Y LOGO-->
    <div id="navbar"></div>
    






    <!--------------------TITULO------------------------>


    <div class="row d-flex justify-content-center">
        <div
            class="col-md-11 p-3 d-flex justify-content-between aling-items-center border-bottom border-gris-oscuro border-2">
            <h2 class=" mt-1 text-success fw-semibold" id="tituloRegistro">Registro de inspeccion</h2>
            <button class="btn btn-secondary " onclick="window.location.href='inicio.html'">Inicio</button>
            <!--encabezado, tamaño (h2)=32px, para titulos, color verde, peso de fuente (semibold)-->
        </div>
    </div>



    <!--CONTAINER-->


    <div class="row justify-content-md-center mt-2 gx-5">
        <!--contenedor tipo fila con justificación centrada m-top-5, espacio horizontal (gx)-5-->



        <!--primer contenedor-->
        <div class="col-md-9 p-4" id="columnaRegistro">
            <!--contenedor tipo columna 6 de 12 espacios dentro de una fila con bg de gris claro y padding de 4 unidades-->

            <h4 class="fw-medium">Registre una nueva inspección</h4>
            <!--titulos de clase(h), el tamaño de (h4), color azuloscuro, peso de fuente medium-->
            <p>Registre los datos del lugar a inspeccionar:</p>
            <!--parrafo (p), de color azul oscuro, peso de fuente normal-->
            <hr>

            <form action="../controllers/VisitaController.php" method="POST"><!--apertura para establecer un formulario-->




                <div class="row mb-4 mt-4"><!-- fila con margin button(por debajo)  de 3 unidades-->
                    <div class="col-md-6">
                        <!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        <label for="nombre" class="form-label">Nombre del
                            usuario:</label><!--titulo encima del indicador de entrada(espacio)-->
                            <input type="text" class="form-control" id="nombre" name="nombre_cliente" placeholder="Nombre completo"><!--indicador de entrada-->
                    </div>

                    <div class="col-md-6">
                        <!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        <label for="identificacion"
                            class="form-label">Identificación:</label><!--titulo encima del indicador de entrada(espacio)-->
                        <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="# de documento"><!--indicador de entrada-->
                    </div>
                </div>


                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->
                    <div class="col-md-6">
                        <!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        <label for="telefono"
                            class="form-label">Teléfono:</label><!--titulo encima del indicador de entrada(espacio)-->
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono-celular"><!--indicador de entrada-->
                    </div>
                    <div class="col-md-6">
                        <!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        <label for="inputAddress" class="form-label">Dirección
                            residencial:</label><!--titulo encima del indicador de entrada(espacio)-->
                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="cra # calle #"><!--indicador de entrada-->
                    </div>
                </div>

                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->
                    <div class="col-md-6"><!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        
                            <label for="fecha" class="mb-3">Selecciona una fecha:</label>
                            <br>
                            <input type="date" id="fecha" name="fecha"/>
                    </div>

                    <div class="col-md-6">
                        <label for="numero_contrato"
                        class="form-label">Numero de contrato:</label><!--titulo encima del indicador de entrada(espacio)-->
                    <input type="number" class="form-control" id="numero_contrato" name="numero_contrato" placeholder="#"><!--indicador de entrada-->
                    </div>
                            
                </div>

                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->

                    <div class="col-md-6">
                        <label for="valor_revicion" class="form-label">Valor de la revisión:</label>
                        <input type="number" class="form-control" id="valor_revicion" name="valor_revision" placeholder="$ Monto" min="0" step="0.01">     
                    </div>
                    
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Tipo de documento:</label><!--texto que describe al selector-->
                            <select name="id_tipo_documento" id="id_tipo_documento" class="form-select w-100"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                <option disabled selected>Elija su tipo de documento</option><!--titulo guia interno del spaceholder-->
                                <?php foreach ($documentos as $docto): ?><!--recorre la lista de la tabla docto de la BD y guarda cada opcion en la variable $docto-->
                                  <option value="<?= $docto['id_tipo_documento'] ?>"><?= $docto['tipo_documento'] ?></option><!--creación de lista de opciones con el valor que la variable $docto arroje según el id de cada opcion-->
                                <?php endforeach; ?><!--cierre de bucle foreach-->
                              </select>
                              
                    </div>
                </div>

                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->

                    <div class="col-md-6">
                              <label for="depto" class="form-label">Departamento:</label><!--texto adherido al placeholder-->
                              <select name="id_depto" id="id_depto" class="form-select"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                <option disabled selected>Seleccione un departamento</option><!--titulo guia interno del spaceholder-->
                                <?php foreach ($departamentos as $depto): ?><!--recorre la lista de la tabla depto de la BD y guarda cada opcion en la variable $depto-->
                                  <option value="<?= $depto['id_depto'] ?>"><?= $depto['depto'] ?></option><!--creación de lista de opciones con el valor que la variable $depto arroje según el id de cada opcion-->
                                <?php endforeach; ?><!--cierre de bucle foreach-->
                              </select>
                              
                    </div>

                    <div class="col-md-6">
                              <label for="municipio" class="form-label">Municipio:</label><!--texto adherido al placeholder-->
                              <select name="id_mupio" id="municipio" class="form-select">
                                <option disabled selected>Seleccione un municipio</option>
                              </select>
                    </div>
                </div>

                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Distribuidora:</label><!--texto adherido al placeholder-->
                        <select class="form-select w-100" name="id_distribuidora" aria-label="Default select example"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                            <option selected disabled>Elija la distribuidora</option> <!--titulo guia interno del spaceholder-->
                            <?php foreach ($distribuidoras as $dist): ?> <!--recorre la lista de la tabla id_distribuidora de la BD y guarda cada opcion en la variable $dist-->
                            <option value="<?= $dist['id_distribuidora'] ?>"><?= $dist['distribuidora'] ?></option><!--creación de lista de opciones con el valor que la variable $dist arroje según el id de cada opcion--> 
                            <?php endforeach; ?><!--cierre de bucle foreach-->
                        </select>

                    </div>
                
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Tipo de gas:</label><!--texto adherido al placeholder-->
                        <select class="form-select w-100" name="id_tipo_gas" aria-label="Default select example"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                            <option selected disabled>Elija el tipo de gas en la residencia</option><!--titulo guia interno del spaceholder-->
                             <?php foreach ($tiposGas as $tipoGas): ?> <!--recorre la lista de la tabla tipo_gas de la BD y guarda cada opcion en la variable $tipoGas-->
                                <option value="<?= $tipoGas['id_tipo_gas'] ?>"><?= $tipoGas['tipo_gas'] ?></option><!--creación de lista de opciones con el valor que la variable $tipoGas arroje según el id de cada opcion--> 
                             <?php endforeach; ?><!--cierre de bucle foreach-->
                        </select>
                    </div>
                </div>

                <div class="row mb-4"><!-- fila con margin button(por debajo)  de 3unidades-->
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Tipo de instalación:</label><!--texto que describe al selector-->
                        <select class="form-select w-100" name="id_tipo_instalacion" aria-label="Default select example"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                            <option selected disabled>Elija el tipo de instalación</option><!--titulo guia interno del spaceholder-->
                             <?php foreach ($tiposInstalacion as $tipoInstal): ?> <!--recorre la lista de la tabla tipo_instalacion de la BD y guarda cada opcion en la variable $tipoInstal-->
                                <option value="<?= $tipoInstal['id_tipo_instalacion'] ?>"><?= $tipoInstal['tipo_instalacion'] ?></option><!--creación de lista de opciones con el valor que la variable $tipoInstal arroje según el id de cada opcion--> 
                             <?php endforeach; ?><!--cierre de bucle foreach-->
                        </select>
                    </div>
                
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Tipo de servicio:</label><!--texto que describe al selector-->
                        <select class="form-select w-100" name="id_tipo_servicio" aria-label="Default select example"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                            <option selected disabled>Elija el tipo de servicio</option><!--titulo guia interno del spaceholder-->
                            <?php foreach ($tiposServicio as $tipoServi): ?> <!--recorre la lista de la tabla tipo_gas de la BD y guarda cada opcion en la variable $dist-->
                                <option value="<?= $tipoServi['id_tipo_servicio'] ?>"><?= $tipoServi['tipo_servicio'] ?></option><!--creación de lista de opciones con el valor que la variable $tipoGas arroje según el id de cada opcion--> 
                             <?php endforeach; ?><!--cierre de bucle foreach-->
                        </select>
                    </div>
                </div>

                <div class="row mb-3"><!-- fila con margin button(por debajo)  de 3unidades-->
                    <div class="col-md-6">
                        <label for="exampleDataList" class="form-label">Estado:</label><!--texto que describe al selector-->
                        <select class="form-select w-100" name="id_estado" aria-label="Default select example"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                            <option selected disabled>Elija el estado</option><!--titulo guia interno del spaceholder-->
                            <?php foreach ($estados as $est): ?> <!--recorre la lista de la tabla tipo_gas de la BD y guarda cada opcion en la variable $dist-->
                                <option value="<?= $est['id_estado'] ?>"><?= $est['tipo_estado'] ?></option><!--creación de lista de opciones con el valor que la variable $tipoGas arroje según el id de cada opcion--> 
                             <?php endforeach; ?><!--cierre de bucle foreach-->
                        </select>
                    </div>
                







                
                    <div class="col-md-12">
                        <!--columna que ocupará 6 de los 12 espacios totales dentro de la fila establecida-->
                        <label for="exampleDataList"
                            class="form-label">Observaciones:</label><!--texto que describe al selector-->
                        <div class="form-floating mb-0"><!--formulario para escrinir texto-->
                            <textarea class="form-control" name="observaciones" placeholder="Leave a comment here" id="floatingTextarea"
                                style="height: 170px;"></textarea><!--esapciadora pata etxto-->
                            <label for="floatingTextarea">Escribe las observaciones dadas por el
                                residente:</label><!--guia para el usuario-->
                        </div>
                    </div>
                </div>

                <div class="row"><!--fila-->
                    <div class="col-md-12 d-flex justify-content-end align-items-end"><!--columna, ocupa todo el espacio disponible,flexible, contenido al final horizontal y verticalmente-->
                        <input class="btn" type="submit" value="Siguiente"><!--boton tipo "submit" esencial para enviar el formulario. no es necesario un onclick. el controlador redirige la pagina-->
                    </div>
                </div>
            </form>



        </div>
    </div>


    <footer class=" mt-5  p-2 border-top border-2 text-center text-azul-institucional">
        © 2024 - GasInspect - Derechos reservados.
    </footer>














    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!--enlace para librería poppers y tooltips de bootstrap (dinamismo sobre botones y enlaces)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script><!--enlace para librería javascript de bootstrap-->
        <script src="nav.js"></script>
</body>

</html>