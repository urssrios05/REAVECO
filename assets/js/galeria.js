const filters = document.querySelectorAll(".filter");
const items = document.querySelectorAll(".item");

filters.forEach(btn => {
  btn.addEventListener("click", () => {

    // activar botón
    filters.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    const filter = btn.dataset.filter;

    // filtrar imágenes
    items.forEach(item => {

      if (filter === "all" || item.dataset.category === filter) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }

    });

  });
});

//MODAL GALERIA

const modal = document.getElementById("galleryModal");
const modalImage = document.getElementById("modalImage");
const modalTitulo = document.getElementById("modalTitulo");
const modalCategoria = document.getElementById("modalCategoria");
const modalFecha = document.getElementById("modalFecha");
const modalDescripcion = document.getElementById("modalDescripcion");
const closeBtn = document.querySelector(".gallery-close");

if (modal && modalImage && modalTitulo && modalCategoria && modalFecha && modalDescripcion && closeBtn) {
  document.querySelectorAll(".gallery-img").forEach(img => {

    img.addEventListener("click", () => {
        modal.style.display = "block";
        modalImage.src = img.dataset.imagen;
        modalTitulo.textContent = img.dataset.titulo;
        modalCategoria.textContent = img.dataset.categoria;
        modalFecha.textContent = img.dataset.fecha;
        modalDescripcion.textContent = img.dataset.descripcion;

    });

  });

  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });

  window.addEventListener("click", (e) => {

    if(e.target === modal){
        modal.style.display = "none";
    }

  });
}
