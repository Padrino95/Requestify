<section>
    <div class="container mt-5">
        <h1 class="mb-4">Filtrar por tipo de edición fotográfica</h1>
        <form action="../controladores/cliente_editores.php" method="POST">
            <div class="mb-3">
                <label for="estilo" class="form-label">Selecciona el tipo de edición:</label>
                <select class="form-select" id="estilo" name="estilo">
                    <option value="">Todos los estilos</option>
                    <?php
                    foreach ($estilos as $value) {
                        echo "<option value='" . $value['cod'] . "'>" . $value['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="enviarFiltrar">Filtrar</button>
        </form>
    </div>
</section>
