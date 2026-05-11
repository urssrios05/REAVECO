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