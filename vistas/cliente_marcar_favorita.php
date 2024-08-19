<section class="container">
    <h2 class="mt-5">Pincha la imagen favorita del proyecto</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php
        foreach ($fotos as $foto) {
        ?>
            <div class="col">
                <div class="card">
                <a href="../controladores/cliente_marcar_foto_favorita.php?idFoto=<?php echo urlencode($foto['id']); ?>">
                        <img src="../assets/imagenes/proyectos/<?php echo $foto['ruta']; ?>" class="card-img-top fixed-size-img" alt="Imagen del proyecto">
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>