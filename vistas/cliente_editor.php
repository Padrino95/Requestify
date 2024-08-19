
<section class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../assets/imagenes/editores/<?php echo $editores["foto"]; ?>" class="img-fluid" alt="ImagenEditor">
            </div>
            <div class="col-md-6">
                <h2><?php echo $editores["nombre"] ?></h2>
                <?php
                // Dividir la presentación en párrafos
                $parrafos = explode("\n", $editores["presentacion"]);
                foreach ($parrafos as $parrafo) {
                    // Imprimir cada párrafo en un elemento <p>
                    echo "<p>$parrafo</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>


<?php 
  if ($fotos) {
?>
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Carrusel de Imágenes</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
          $total_imagenes = count($fotos);
          $num_imagenes_por_grupo = 4;
          $num_grupos = ceil($total_imagenes / $num_imagenes_por_grupo);
          
          for ($i = 0; $i < $num_grupos; $i++) {
            echo '<div class="carousel-item';
            if ($i === 0) {
              echo ' active';
            }
            echo '">';
            echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">';
            for ($j = 0; $j < $num_imagenes_por_grupo; $j++) {
              $imagen_index = $i * $num_imagenes_por_grupo + $j;
              if ($imagen_index >= $total_imagenes) {
                break;
              }
              echo '<div class="col">';
              echo '<img src="../assets/imagenes/proyectos/' . $fotos[$imagen_index]['ruta'] . '" class="d-block w-100 img-fluid" alt="Imagen ' . ($imagen_index + 1) . '">';
              echo '</div>';
            }
            echo '</div>';
            echo '</div>';
          }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>
<?php 
}
?>




