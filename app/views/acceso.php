<?php
session_start();
require_once __DIR__ . '/../controllers/AccesoController.php';

use app\controllers\AccesoController;

$auth = new AccesoController();
$auth->login();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title><!--titulo de la pestaña-->

        
        <link rel="icon" href="/GASINSPECT/app/views/logo/logimag.png" type="image/x-icon"><!--link para añadir icono de la empresa en la pestaña de la pagina web-->
        <link rel="stylesheet" href="/GASINSPECT/app/views/main.css"><!--enlace de estilos css-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"><!--link de bootstrap-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"><!--enlace con fuente de letra estilo montserrat-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"><!--enlace con biblioteca de iconos de bootstrap-->
        <link rel="stylesheet" href="../views/navstyle.css"><!--link para la carpeta navstyle-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--link ´pára los iconos de font awesome-->

        

</head>

<body class="mod-registroUsuario">

   
        <div class="row" id="header"><!--declaracion de una fila que será el encabezado de pagina-->
            <div class="row" id="rowazul"></div><!--primer container, tipo fila color azul oscuro-->

            <div class="gris"><!--segundo container que albergará un grupo de enlaces-->
                    <nav class="navbar-inicio"><!--barra de navegación-->
                        <ul class="navbar-menu"><!--grupo de enlaces-->
                            <li><a href="#">Descargar App</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    








                       <!------------------------------------CONTAINER DE FORMULARIOS PARA REGISTRO DE USUARIOS--------------------------->


<!--container de formulario de inicio de sesión-->
    <div class="row justify-content-center mt-5" id="rowAcceder"><!--fila que contendrá 2 columnas (columna de formulario y columna de imagen icono)-->

        <div class="col-md-5 mb-5" id="colAcceder"><!--primer columna, tamaño de 5 unidades-->

            <h1  id="titleA">Acceder</h1><!--titulo, tamaño h1, color verde-->
            <p style="font-weight: bold;">inicie sesión ingresando su usuario asignado y su contraseña</p><!--subtitulo, tipo parrafo, con fuente tipo bold--> 

            <div class="form-contenido p-4"><!--container que contiene un grupo de formularios-->
                
                <form method="POST" action="acceso.php">
                    <?php if (isset($_GET['error'])): ?>
                        <div style="color:red;">Usuario o contraseña incorrectos.</div>
                    <?php endif; ?><!--iniciación de formulario-->

                    <div class="input-group mb-3" id="grupoFormularios"><!--contenedor que agrupa a los campos de entrada y los concentra de forma ordenada-->
                        <div class="input-field mb-4"><!--container que permite acoplar al icono junto al placeholder-->
                            <div class="input-icon" id="iconoUsuario"><!--contenedor para icono-->
                                <i class="bi bi-person-fill"></i><!--icono de usuario extraido de bootstrap-->
                                <input type="text" class="form-control" aria-label="Text input with checkbox" name="correo" placeholder="Correo electrónico" required><!--campo de texto para ingresar el usuario-->
                            </div>
                        </div>
                        <div class="input-field mb-2"><!--container que permite acoplar al icono junto al placeholder-->
                            <div class="input-icon" id="iconoContraseña"><!--contenedor para icono-->
                                <i class="bi bi-lock-fill"></i><!--icono de contraseña extraido de bootstrap-->
                                <input type="password" class="form-control" aria-label="Text input with checkbox" name="contrasena" placeholder="Contraseña" required><!--campo de texto para ingresar el contraseña-->
                            </div>
                        </div>
                        <p>¿olvidaste tu contraseña? <a href="#"> click aquí</a></p><!--texto con link que indican opción de recuperar contraseña-->
                    </div>

                    <div class="btn-field">
                        <input class="btn" id="btnIngresar" type="submit" value="Ingresar"><!--boton para ingresar, color azul-oscuro, tipo submit (envía lo ingresado en campo de texto), con interacción al tocarlo en color azul claro-->
                        <input class="btn" id="btnReg" onclick="window.location.href='/GASINSPECT/app/views/registroUsuario.php'" value="Registrarse"><!--boton para registrarse, color blanco (transporte a otra ventana), con interacción al tocarlo en color azul claro-->
                    </div>
                </form>
            </div>
        </div><!--cierre de primera columna de la primera fila-->

        <div class="col-md-3 d-flex justify-content-center align-items-center"><!--segunda columna, aolumna flexible, centra sus elementos de forma vertical-->
            <div class="image-container"><!--container para imagen-->
                <img src="/GASINSPECT/app/views/images/logoInicio.jpeg" alt="123.jpeg"><!--imagen de logo CIG en celular-->
            </div>
        </div>
    </div>




    <div class="row justify-content-center mt-3" id="rowContactenos"><!--fila que contendrá 2 columnas (columna de formulario y columna de imagen icono)-->

        <div class="col-md-4 mb-5" id="colContactenos"><!--primer columna, tamaño de 5 unidades-->
            <div class="form-content ms-2">
                <h4>Contáctenos:</h4>
                <form>
                    <div class="input-group mb-3 mt-3" id="camposContacto">
                        <div class="input-field">
                            <input type="text" class="form-control" placeholder="Nombre completo" aria aria-label="Nombre completo">
                        </div>
                        <div class="input-field">
                            <input type="email" class="form-control" placeholder="Correo electrónico" aria aria-label="Correo electrónico">
                        </div>
                    </div>
                    <div class="btn-field">
                        <input class="btn" type="submit" value="Enviar"><!--boton para enviar, color azul-oscuro, tipo submit (envía lo ingresado en campo de texto), con interacción al tocarlo en color azul claro-->
                    </div>
                </form>
            </div>
        </div>


            <div class="col-md-4 mb-5" id="colDireccion"><!--primer columna, tamaño de 5 unidades-->
                <h4 class="location"><i class="bi bi-buildings"></i>Medellín Antioquia</h4><!--subtitulo-->
                <div class="info ms-5"><!--container para agrupar elementos informativos-->
                    <p><i class="bi bi-geo-alt"></i>  Carrera 6A #47A-40 47a 40, Jesús</p><!--datos de la empresa con icono a su izquierda-->
                    <p><i class="bi bi-envelope"></i>  servicliente@cotrolleringenieriaygas.com</p>
                    <p><i class="bi bi-telephone"></i> 604 592 76 63</p>
                    <p><i class="bi bi-phone"></i> +57 300 366 1537</p>
                    <p><i class="bi bi-phone"></i> +57 322 219 9264</p>
                    <p><a href="https://wa.me/3003661537" target="_blank" class="social-icon"><i class="bi bi-whatsapp"></i> WhatsApp</a></p><!--link de whatsapp-->
                    <p><a href="https://www.facebook.com/tu-perfil" target="_blank" class="social-icon"><i class="bi bi-facebook"></i> Facebook</a></p><!--link de facebook-->
                </div>
            </div>


            <div class="col-md-4 mb-5 justify-content-center" id="colMapa"><!--primer columna, con4 de 12 unidades, contenido centrado-->
                <section class="map-container"><!--container para subtitulo y mapa-->
                    <h4>Encuéntranos aquí</h4><!--subtitulo-->
                    <div class="map-frame"><!--container del mapa-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2567511482252!2d-75.53796200969923!3d6.229843427703549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4429f34818269d%3A0x3903601e60ba1e8b!2sCarrera%206A%20%2347A-40%2047a%2040!5e0!3m2!1ses!2sco!4v1723267271642!5m2!1ses!2sco" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><!--link googlemaps-->
                    </div>
                </section>
            </div>
    </div>

    <footer class="mt-3"><!--pie de pagina-->
        <div class="row mt-3"><!--con fila con un margin-buttom-3-->
            <div class="col-md-12 mb-3 mt-3"><!--columna, ocupa 4 de 12 unidades m-top-3, m-buttom-3-->
                    <h3 class="download-title">Descargue la App móvil gratis</h3><!--subtitulo-->
                    <p class="info-text">C.I.G ahora puede ser portable. Conozca las características y funcionalidades de la App descargándola ahora desde Google Play.</p><!--parrafo de explicación-->
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank" class="playstore-button"><i class="bi bi-google-play"></i> Descargar en Google Play</a><!--boton con icono de googleplay y enlace-->
            </div>
        </div>


        <div  class=" mt-5  p-2 border-top border-2 text-center text-azul-institucional">
            © 2024 - GasInspect - Derechos reservados.
        </div>
        
    </footer>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script><!--enlace para librería poppers y tooltips de bootstrap (dinamismo sobre botones y enlaces)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script><!--enlace para librería javascript de bootstrap-->
    <script src="nav.js"></script><!--enlace hacia el archivo de javascript-->


</body>
</html>