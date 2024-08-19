<section id="plataformas" class="container pt-5">
    <div class="row justify-content-center">
        <h2 class="text-center pt-5">Editores Filtrados</h2>
        <?php
        foreach ($editores2 as $value) {
            echo "<div class='col-md-auto mt-5 pt-5'>";
            echo "<a href='./cliente_editor.php?id=$value[id]'>";
            echo "<div class='img-container'>";
            echo "<img src='../assets/imagenes/editores/$value[foto]' class='img-fluid rounded-circle'>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</section>