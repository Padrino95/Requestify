<section class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="../assets/imagenes/editores/<?php echo $info['foto']; ?>" class="img-fluid" alt="fotoPerfilEditor">
        </div>
        <div class="col-md-6">
            <h2 class="mt-4"><?php echo $info['nombre'] ; ?></h2>
            <?php
                // Dividir la presentación en párrafos
                $parrafos = explode("\n", $info["presentacion"]);
                foreach ($parrafos as $parrafo) {
                    // Imprimir cada párrafo en un elemento <p>
                    echo "<p>$parrafo</p>";
                }
            ?>
            <a href="../controladores/editor_editar_perfil.php?id=<?php echo $_SESSION['id']; ?>&presentacion=<?php echo $info['presentacion']; ?>&nombre=<?php echo $info['nombre']; ?>&nick=<?php echo $_SESSION['nick']; ?>&foto=<?php echo $info['foto']; ?>" class="btn btn-light">Editar mi perfil</a>
        </div>
    </div>
</section>