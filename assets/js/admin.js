
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

// ✅ PREVIEW IMAGEN (VERSIÓN FINAL LIMPIA)
document.addEventListener("DOMContentLoaded", () => {

	const input = document.getElementById("imagenInput");
	const preview = document.getElementById("preview");

	if (!input || !preview) return;

	input.addEventListener("change", function () {
		const file = this.files[0];

		if (file) {

			// Validación básica
			if (!file.type.startsWith("image/")) {
				alert("Solo se permiten imágenes");
				input.value = "";
				preview.style.display = "none";
				return;
			}

			const reader = new FileReader();

			reader.onload = function (e) {
				preview.src = e.target.result;
				preview.style.display = "block";
			};

			reader.readAsDataURL(file);
		}
	});
});

// evitar volver con botón atrás después de logout
window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});

document.querySelectorAll('.btn-editar').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        document.getElementById('modalEditar').style.display = 'block';

        document.getElementById('edit-id').value = this.dataset.id;
        document.getElementById('edit-titulo').value = this.dataset.titulo;
        document.getElementById('edit-categoria').value = this.dataset.categoria;
        document.getElementById('edit-descripcion').value = this.dataset.descripcion;
    });
});

document.getElementById('modalEditar').classList.add('show');

document.getElementById('modalEditar').classList.remove('show');

// cerrar modal
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modalEditar').style.display = 'none';
});