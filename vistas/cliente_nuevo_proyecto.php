<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="text-center mb-4">Rellene los datos del nuevo proyecto</h2>
            <form method="POST" action="#" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título del Proyecto</label>
                    <input type="text" class="form-control" id="titulo" rows="3" name="titulo" placeholder="Ingrese el título del proyecto"></input>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción del Proyecto</label>
                    <textarea class="form-control" id="descripcion" rows="3" name="descripcion" placeholder="Ingrese la descripción del proyecto"></textarea>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Seleccione el editor</label>
                    <select class="form-select" id="editor" name="editor">
                        <option value="">Todos los editores</option>
                        <?php
                        foreach ($editores as $editor) {
                            echo "<option value='$editor[id]'>$editor[nombre]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fotos" class="form-label">Añada las fotos que desee al proyecto</label>
                    <input type="file" name="fotos[]" id="fotos" multiple>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" name="añadir">Guardar Proyecto</button>
                </div>
            </form>
        </div>
    </div>
</section>