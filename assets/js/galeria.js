// MODAL GALERIA

const modal = document.getElementById("galleryModal");
const modalImage = document.getElementById("modalImage");
const modalTitulo = document.getElementById("modalTitulo");
const modalCategoria = document.getElementById("modalCategoria");
const modalFecha = document.getElementById("modalFecha");
const modalDescripcion = document.getElementById("modalDescripcion");
const closeBtn = document.querySelector(".gallery-close");

const images = document.querySelectorAll(".gallery-img");
const prevBtn = document.getElementById("prevImage");
const nextBtn = document.getElementById("nextImage");

let currentIndex = 0;

// Swipe variables
let touchStartX = 0;
let touchEndX = 0;

// Cargar imagen en modal
function loadImage(index) {

    const img = images[index];

    modalImage.src = img.dataset.imagen;
    modalTitulo.textContent = img.dataset.titulo;
    modalCategoria.textContent = img.dataset.categoria;
    modalFecha.textContent = img.dataset.fecha;
    modalDescripcion.textContent = img.dataset.descripcion;

}

// Swipe handler
function handleSwipe() {

    const distance = touchStartX - touchEndX;

    // Siguiente imagen
    if (distance > 50) {

        currentIndex++;

        if (currentIndex >= images.length) {
            currentIndex = 0;
        }

        loadImage(currentIndex);

    }

    // Imagen anterior
    if (distance < -50) {

        currentIndex--;

        if (currentIndex < 0) {
            currentIndex = images.length - 1;
        }

        loadImage(currentIndex);

    }

}

// Init modal
if (
    modal &&
    modalImage &&
    modalTitulo &&
    modalCategoria &&
    modalFecha &&
    modalDescripcion &&
    closeBtn
) {

    // Click en imágenes
    images.forEach((img, index) => {

        img.addEventListener("click", () => {

            currentIndex = index;
            loadImage(currentIndex);
            modal.style.display = "block";

        });

    });

    // Swipe móvil (seguro)
    if (modalImage) {

        modalImage.addEventListener("touchstart", (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        modalImage.addEventListener("touchend", (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

    }

    // Cerrar modal
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    // Flecha anterior
    if (prevBtn) {

        prevBtn.addEventListener("click", () => {

            currentIndex--;

            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            }

            loadImage(currentIndex);

        });

    }

    // Flecha siguiente
    if (nextBtn) {

        nextBtn.addEventListener("click", () => {

            currentIndex++;

            if (currentIndex >= images.length) {
                currentIndex = 0;
            }

            loadImage(currentIndex);

        });

    }

    // Teclado
    document.addEventListener("keydown", (e) => {

        if (modal.style.display !== "block") return;

        if (e.key === "ArrowLeft" && prevBtn) {
            prevBtn.click();
        }

        if (e.key === "ArrowRight" && nextBtn) {
            nextBtn.click();
        }

        if (e.key === "Escape") {
            modal.style.display = "none";
        }

    });

}