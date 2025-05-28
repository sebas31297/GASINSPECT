<?php require_once __DIR__. '/../controllers/formUserController.php'; ?> <!--inclusión del controlador formularioController.php para que prepare los datos que el formulario necesitará-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet"><!-- Banderas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"><!-- Iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"><!-- Fuente Montserrat -->
    <link rel="stylesheet" href="../views/main.css"><!-- Estilos personalizados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--favicon-->
    <link rel="icon" type="image/x-icon"    href="../views/logo/logimag.png">
</head>

<body>
<!--NAVEGAVOR ICONOS Y LOGO-->
<div class="container-fluid p-0 mb-5 ">
    <div class="row m-0" id="header"></div>
</div>

<!--FIN NAVEGAVOR ICONOS Y LOGO-->

<!---------------------------------encabezado y boton -------->


<div class="registro-container" ><!--nombre para mi css-->
    <div class="container">
        <div class="row mt-3 g-0">
<!----------------------------- -Sección de Registro --------------------------------------------------->
            <div class="col-md-7">
                <div class="card-custom">
                    <h5>Regístrate</h5>
                    <p>Registra tu información.
                    <br> El usuario y la contraseña serán enviados al correo registrado.</p>
                    <form id="registroForm" action="../controllers/UsuarioController.php" method="POST" enctype="multipart/form-data"><!--apertura para establecer un formulario / enctype para la foto-->
                        <!-- Nombre completo y Email -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" >Nombre completo</label>
                                <input type="text" class="form-control" name="nombre_usuario" placeholder="Escribe tu nombre" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
                            </div>
                        </div>
                        <!-- Teléfono e Identificación -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telefono" class="form-label" required>Teléfono</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="countryButton">
                                        <span class="flag-icon flag-icon-co"></span> <!------- eleccion de Bandera de Colombia ------>
                                    </button>
                                    <ul class="dropdown-menu" id="countryMenu">
                                        <li><a class="dropdown-item" href="#" onclick="updateCountry('+57', 'co')"><span class="flag-icon flag-icon-co"></span> Colombia</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateCountry('+58', 've')"><span class="flag-icon flag-icon-ve"></span> Venezuela</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="updateCountry('+55', 'br')"><span class="flag-icon flag-icon-br"></span> Brasil</a></li>
                                    </ul>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion" placeholder="Dirección" required>
                            </div>
                            
                        </div>
                        <!-- contraseña y Confirmar contraseña  -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" placeholder="Nueva contraseña" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" placeholder="Confirmar contraseña" required>
                        </div>
                        
                    </div>
                    <!-- identificacion y Dependencia -->
                    <div class="row mb-3">
                        
                        <div class="col-md-6">
                            <label for="identificacion" class="form-label">Identificación</label>
                                <select name="id_tipo_documento" id="id_tipo_documento" class="form-select w-100"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                    <option disabled selected>Elija su tipo de documento</option><!--titulo guia interno del spaceholder-->
                                <?php foreach ($documentos as $docto): ?><!--recorre la lista de la tabla docto de la BD y guarda cada opcion en la variable $docto-->
                                  <option value="<?= $docto['id_tipo_documento'] ?>"><?= $docto['tipo_documento'] ?></option><!--creación de lista de opciones con el valor que la variable $docto arroje según el id de cada opcion-->
                                <?php endforeach; ?><!--cierre de bucle foreach-->
                                </select>

                                <input type="text" class="form-control" id="identificacion" name="identificacion"placeholder="Número de identificación" required>
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            </div>
                    </div>
                        <div class="col-md-6">
                            <label for="dependencia" class="form-label">Dependencia</label>
                            <select name="id_cargo" id="dependencia" class="form-select w-100"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                <option disabled selected>dependencia</option><!--titulo guia interno del spaceholder-->
                                
        
                                <?php foreach ($cargos as $dep): ?><!--recorre la lista de la tabla docto de la BD y guarda cada opcion en la variable $docto-->
                                  <option value="<?= $dep['id_cargo'] ?>"><?= $dep['nombre_cargo'] ?></option><!--creación de lista de opciones con el valor que la variable $docto arroje según el id de cada opcion-->
                                <?php endforeach; ?><!--cierre de bucle foreach-->
                            </select>
                         
                        </div>
                    
                        <!-- Botón Registrar -->
                        <div class="row mb-3">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-save btn-sm" onclick="window.location.href='acceso.html'">Atras</button>
                                <button type="submit" class="btn btn-save btn-sm">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<!-- ----------------------Sección de Foto de Perfil ------------------------------------------------------>
            <div class="col-md-5">
                <div class="card-custom">
                    <h5>Foto de perfil</h5>
                    <p>Carga tu foto de perfil</p>
                    <div class="row justify-content-center align-items-center" style="height: 100%; margin-top: -15px;">
                        <div class="col-md-12 text-center">
                            <div class="profile-pic-container" style="height: 80%; position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column; overflow: hidden; border-radius: 10px;">
                                <i id="placeholderIcon" class="bi bi-image display-1" style="color: rgba(10, 0, 124, 0.5);"></i>
                                <img id="previewImage" src="#" alt="Imagen de perfil" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                                <p id="importText" style="position: absolute; bottom: 10px; color: rgba(10, 0, 124, 0.5); font-weight: bold;">Importar imagen</p>
                                <input type="file" id="fileInput" accept="image/*" capture="environment" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer;" onchange="loadImage(event)">
                            </div>
                            <button type="button" id="removeButton" class="btn btn-outline-danger btn-sm mt-2" style="display: none;" onclick="removeImage()">Eliminar imagen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<script>
    function loadImage(event) {
        const previewImage = document.getElementById('previewImage');
        const placeholderIcon = document.getElementById('placeholderIcon');
        const importText = document.getElementById('importText');
        const removeButton = document.getElementById('removeButton');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; // Muestra la imagen cargada
                placeholderIcon.style.display = 'none'; // Oculta el ícono inicial
                importText.style.display = 'none'; // Oculta el texto de importar imagen
                removeButton.style.display = 'inline-block'; // Muestra el botón de eliminar
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        const previewImage = document.getElementById('previewImage');
        const placeholderIcon = document.getElementById('placeholderIcon');
        const importText = document.getElementById('importText');
        const removeButton = document.getElementById('removeButton');

        // Restaura el estado inicial
        previewImage.src = '#';
        previewImage.style.display = 'none'; // Oculta la imagen cargada
        placeholderIcon.style.display = 'block'; // Muestra el ícono inicial
        importText.style.display = 'block'; // Muestra el texto de importar imagen
        removeButton.style.display = 'none'; // Oculta el botón de eliminar
    }
</script>
<script>
    // Validaciones de formulario
    document.getElementById('registroForm').addEventListener('submit', function(event) {
        // Obtener valores de los campos
        const form = event.target;
        const nombre = form.querySelector('input[placeholder="Escribe tu nombre"]').value.trim();
        const email = form.querySelector('input[placeholder="Correo electrónico"]').value.trim();
        const telefono = form.querySelector('#telefono').value.trim();
        const identificacion = form.querySelector('#identificacion').value.trim();
        const password = form.querySelector('input[placeholder="Nueva contraseña"]').value.trim();
        const confirmPassword = form.querySelector('input[placeholder="Confirmar contraseña"]').value.trim();
        const dependencia = document.getElementById('dependencia').value.trim();

        // Validar campos obligatorios
        if (!nombre || !email || !telefono || !identificacion || !password || !confirmPassword || !dependencia) {
            alert('Por favor, completa todos los campos obligatorios antes de enviar.');
            event.preventDefault(); // Detener envío
            return;
        }

        // Validar coincidencia de contraseñas
        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            event.preventDefault(); // Detener envío
            return;
        }
    });

    // Función para actualizar el valor de la dependencia
    function updateDependencia(valor) {
        document.getElementById('dependencia').value = valor;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<footer class=" mt-5 p-3 border-top border-2 text-center text-azul-institucional">
    © 2024 - GasInspect - Derechos reservados.
</footer>
</body>
</html>
