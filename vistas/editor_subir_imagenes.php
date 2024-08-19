<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="text-center mb-4">Adjunte las imagenes editadas</h2>
            <form method="POST" action="#" enctype="multipart/form-data">
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