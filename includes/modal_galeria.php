<div id="galleryModal" class="gallery-modal">

    <div class="gallery-modal-content">

        <span class="gallery-close">&times;</span>

        <!-- CONTENEDOR DE IMAGEN -->
        <div class="gallery-image-container">

            <!-- Flecha anterior -->
            <button id="prevImage" class="gallery-nav prev">
                &#10094;
            </button>

            <!-- Imagen -->
            <img id="modalImage" src="" alt="">

            <!-- Flecha siguiente -->
            <button id="nextImage" class="gallery-nav next">
                &#10095;
            </button>

        </div>

        <!-- INFORMACIÓN -->
        <div class="gallery-info">

            <h2 id="modalTitulo"></h2>

            <p>
                <strong>Categoría:</strong>
                <span id="modalCategoria"></span>
            </p>

            <p>
                <strong>Fecha:</strong>
                <span id="modalFecha"></span>
            </p>

            <p>
                <strong>Descripción:</strong>
            </p>

            <p id="modalDescripcion"></p>

        </div>

    </div>

</div>