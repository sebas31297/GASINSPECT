<?php 
// ver errores en el navegador util para desarrrollo
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__. '/../controllers/formUserController2.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mostrar mensaje flash si existe y luego borrarlo
if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-<?= $_SESSION['mensaje']['tipo'] ?> mx-3 mt-3">
        <?= htmlspecialchars($_SESSION['mensaje']['texto']) ?>
    </div>
<?php
    unset($_SESSION['mensaje']);
endif;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet"><!--banderas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"><!--iconos-->
    <link rel="stylesheet" href="/GASINSPECT/app/views/main.css"><!-- Estilos personalizados -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--favicon-->
    <link rel="icon" type="image/x-icon"    href="/GASINSPECT/app/views/logo/logimag.png">
</head>

<body>
<!--NAVEGAVOR ICONOS Y LOGO-->
<div id="navbar"></div>
<script src="nav.js"></script>

<!--FIN NAVEGAVOR ICONOS Y LOGO-->
 <!---------------------------------encabezado y boton -------->
<div class="row d-flex justify-content-center">
    <div
        class="col-md-11 p-3 d-flex justify-content-between aling-items-center border-bottom border-gris-oscuro border-2">
        <h2 class=" mt-1 text-success fw-semibold" id="tituloRegistro">Perfil</h2>
        <button class="btn btn-secondary " onclick="window.location.href='/GASINSPECT/app/views/inicio.html'">Inicio</button>
        <!--encabezado, tamaño (h2)=32px, para titulos, color verde, peso de fuente (semibold)-->
    </div>
</div>

<div class="registro-container"><!--nombre para mi css-->
  <div class="container">
    <div class="row mt-3 g-0">
<!-- ------------------------------Sección de Edición -------------------->
        <div class="col-md-7">
            <div class="card-custom">
                <h5>Edición</h5>
                <p>El usuario y contraseña serán enviados al correo registrado.</p>
                <form action="../public/index.php?action=actualizar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
                    <!-- Nombre completo y Email -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" name="nombre_usuario" value="<?=htmlspecialchars($usuario['nombre_usuario'] ?? '') ?>"placeholder="Nombre completo" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="correo" value="<?=htmlspecialchars($usuario['correo'] ?? '') ?>"placeholder="Correo electrónico" required>
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
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?=htmlspecialchars($usuario['telefono'] ?? '') ?>"placeholder="Número de teléfono" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="<?=htmlspecialchars($usuario['direccion'] ?? '') ?>"placeholder="Dirección" required>
                        </div>
                        
                    </div>
                    <!-- contraseña y Confirmar contraseña  -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena"placeholder="Nueva contraseña" required>
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
                        <div class="input-group">
                            <!-- Botón desplegable más pequeño -->
                            <select name="id_tipo_documento" id="id_tipo_documento" class="form-select- mini"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                    <option disabled selected>CC.</option><!--titulo guia interno del spaceholder-->
                                    <?php foreach ($documentos as $docto): ?><!--recorre la lista de la tabla docto de la BD y guarda cada opcion en la variable $docto-->
                                    <option value="<?= $docto['id_tipo_documento'] ?>"><?= $docto['tipo_documento'] ?></option><!--creación de lista de opciones con el valor que la variable $docto arroje según el id de cada opcion-->
                                    <?php endforeach; ?><!--cierre de bucle foreach-->
                                    </select>                            
                            <input type="text" class="form-control" id="identificacion" name="identificacion" value="<?=htmlspecialchars($usuario['identificacion'] ?? '') ?>" placeholder="Número de identificación" required>
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="dependencia" class="form-label">Dependencia</label>
                            <select name="id_cargo" id="dependencia" class="form-select w-100"><!--formulario de selección de opciones, de llenado obligatorio (required)-->
                                <option disabled selected>elige el cargo</option><!--titulo guia interno del spaceholder-->
                                
        
                                <?php foreach ($cargos as $dep): ?><!--recorre la lista de la tabla docto de la BD y guarda cada opcion en la variable $docto-->
                                <option value="<?= $dep['id_cargo'] ?>"><?= $dep['nombre_cargo'] ?></option><!--creación de lista de opciones con el valor que la variable $docto arroje según el id de cada opcion-->
                                <?php endforeach; ?><!--cierre de bucle foreach-->
                            </select>
                         
                    </div>
                </div>
                    <!-- Botón Guardar -->
                    <div class="row mb-3">
                        <div class="col-md-12 text-end">

                            <a href="/GASINSPECT/public/index.php?action=logout" class="btn btn-primary btn-sm">Cerrar sesión</a>
                            <button type="submit" class="btn btn-save btn-sm">Guardar</button>
                            <a href="/GASINSPECT/public/index.php?action=eliminar&id_usuario=<?= $usuario['id_usuario'] ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Estás seguro de eliminar tu cuenta? Esta acción no se puede deshacer.');">Eliminar</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <!-- Sección de Foto de Perfil -->
        <div class="col-md-5">
            <div class="card-custom" style="height: 100%;">
                <h5>Foto de perfil</h5>
                <p>Carga tu foto de perfil</p>
                <div class="row justify-content-center align-items-center" style="height: 100%; margin-top: -15px;">
                    <div class="col-md-12 text-center">
                        <!-- Contenedor principal -->
                        <div class="profile-pic-container" style="height: 80%; position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column; overflow: hidden; border-radius: 10px;">
                            <!-- Ícono inicial -->
                            <i id="placeholderIcon" class="bi bi-image display-1" style="color: rgba(10, 0, 124, 0.5);"></i>
                            <!-- Imagen cargada -->
                            <img id="previewImage" src="<?= $usuario['foto'] ? '../uploads/' . $usuario['foto'] : '#' ?>" alt="Imagen de perfil" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                            <!-- Texto Importar Imagen -->
                            <p id="importText" style="position: absolute; bottom: 10px; color: rgba(10, 0, 124, 0.5); font-weight: bold;">Importar imagen</p>
                            <!-- Botón invisible para cargar archivo o tomar foto -->
                            <input type="file" name="foto" id="fileInput" accept="image/*" capture="environment" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer;" onchange="loadImage(event)">
                        </div>
                        <!-- Botón para eliminar la imagen  -->
                        <button type="button" id="removeButton" class="btn btn-outline-danger btn-sm mt-2" style="display: none;" onclick="removeImage()">Eliminar imagen</button>
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
        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<footer class=" mt-5  p-2 border-top border-2 text-center text-azul-institucional">
    © 2024 - GasInspect - Derechos reservados.
</footer>
</body>
</html>


