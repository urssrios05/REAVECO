<div id="modalEditar" class="modal">

    <div class="modal-content">

        <span class="close"> <i class="bx bx-x"> </i> </span>
        
        <div class="head"> <h2>Editar imagen</h2> </div>
        <br>
        <div class="todo">
            <form action="actions/editar.php" method="POST">
                <input type="hidden" name="id" id="edit-id">

                <label>Título</label>
                <input type="text" name="titulo" id="edit-titulo" required>
                <br>
                <label>Descripcion</label>
                <textarea type="text" name="descripcion" id="edit-descripcion" required></textarea>
                <br>
                <label>Categoría</label>
                <select type="select" name="categoria" id="edit-categoria" required>
                    <option value="manzana">Manzana</option>
                    <option value="naranja">Naranja</option>
                    <option value="platano">Plátano</option>                    
                </select>
                <br>
                <button type="submit">Guardar cambios</button>


            </form>
        </div>

    </div>

</div>