






        

// FUNCION CARRUSEL DE IMAGENES DE LA PAGINA DE INICIO



// Variables para el carrusel
let index = 0; // Índice de la imagen actual
const images = document.querySelectorAll('.carusel-images img'); // Todas las imágenes del carrusel
const totalImages = images.length; // Número total de imágenes
const intervalTime = 3000; // Tiempo para el cambio automático (3 segundos)
let autoSlide;

// Función para mostrar la imagen actual según el índice
function showImage(index) {
    // Mueve el contenedor de imágenes usando translateX
    const translateValue = -(index * 100); // Desplazamiento de -100% por cada imagen
    document.querySelector('.carusel-images').style.transform = `translateX(${translateValue}%)`;
}

// Función para ir a la siguiente imagen
function nextImage() {
    index = (index + 1) % totalImages; // Incrementa el índice y vuelve a 0 si llega al final
    showImage(index);
}

// Función para ir a la imagen anterior
function prevImage() {
    index = (index - 1 + totalImages) % totalImages; // Decrementa el índice y vuelve al último si llega al inicio
    showImage(index);
}

// Evento para el botón "Next"
document.querySelector('.carusel-boton.next').addEventListener('click', function () {
    clearInterval(autoSlide); // Detiene el deslizamiento automático temporalmente al hacer clic
    nextImage();
    autoSlide = setInterval(nextImage, intervalTime); // Reinicia el deslizamiento automático
});

// Evento para el botón "Prev"
document.querySelector('.carusel-boton.prev').addEventListener('click', function () {
    clearInterval(autoSlide); // Detiene el deslizamiento automático temporalmente al hacer clic
    prevImage();
    autoSlide = setInterval(nextImage, intervalTime); // Reinicia el deslizamiento automático
});

// Iniciar el movimiento automático
autoSlide = setInterval(nextImage, intervalTime);



