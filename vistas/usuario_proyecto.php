<section class="container mb-3">
    <!-- <h2 class="mt-5">Detalles del Proyecto</h2> -->
    <div class="row d-flex justify-content-between">
        <div class="col-md-5">
            <img src="../assets/imagenes/editores/<?php echo $nombre['foto']; ?>" class="img-fluid" alt="foto del editor del proyecto">
        </div>
        <div class="col-md-5 mt-3">
            <h3 class="mt-5 mb-5">Editor : <?php echo $nombre['nombre']; ?></h3>
            <p>Comentario del cliente : <?php echo $info['comentario']; ?></p>
            <p>El cliente ha valorado el proyecto con un : <?php echo $info['puntos']; ?>/5</p>
            <div class="stars">
                <?php
                $puntos = $info['puntos']; // Asumiendo que los puntos son un valor entre 0 y 5
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $puntos) {
                        echo '<i class="fas fa-star"></i>'; // Estrella llena
                    } else {
                        echo '<i class="far fa-star"></i>'; // Estrella vacía
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <!-- <h2 class="mt-5">Detalles del Proyecto</h2> -->
    <div class="card mb-1 divProyectoClaro">
        <div class="card-body">
            <h5 class="card-title"><?php echo $info['titulo'] ?></h5>
            <?php
            // Dividir la descripcion en párrafos
            $parrafos = explode("\n", $info["descripcion"]);
            foreach ($parrafos as $parrafo) {
                // Imprimir cada párrafo en un elemento <p>
                echo "<p>$parrafo</p>";
            }
            ?>
        </div>

    </div>
    <div class="card mb-3">
        <img src="../assets/imagenes/proyectos/<?php echo $destacada['ruta']; ?>" alt="imagen destacada del proyecto">
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php
        foreach ($fotos as $foto) {
        ?>
            <div class="col">
                <div class="card">
                    <img src="../assets/imagenes/proyectos/<?php echo $foto['ruta']; ?>" class="card-img-top fixed-size-img" alt="Imagen del proyecto">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
