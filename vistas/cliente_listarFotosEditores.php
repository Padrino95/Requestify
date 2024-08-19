<section id="plataformas" class="container pt-5 mb-5">
    <div class="row justify-content-center">
        <h1 class="text-center pt-2">Editores disponibles</h1>
        <?php
        foreach ($fotosEditores as $value) {
            echo "<div class='col-md-auto mt-5 pt-5 d-flex justify-content-center'>";
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


<section class="py-5">
    <div class="container mt-5">
        <h2 class="text-center mb-4 mt-4">Editor del mes</h2>
        <div class="row">
            <div class="col-md-5">
                <img src="../assets/imagenes/editores/<?php echo $fotoEditor['foto'] ; ?>" class="img-fluid" alt="Imagen 1">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[0]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 2">
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[1]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[2]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 4">
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[3]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[4]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 4">
                    </div>
                    <div class="col-md-6">
                        <img src="../assets/imagenes/proyectos/<?php echo $seisFotos[5]['ruta'] ; ?>" class="img-fluid mb-2" alt="Imagen 5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
    // echo"<table>";
    // foreach($lista_socios as $value){
    ?>
        <!-- <tr>
            <td><?php $value['id']?>1</td>
            <td><?php $value['nombre']?>2</td>
            <td><?php $value['nick']?>3</td>
        </tr> -->
    <?php
    // }
    // echo"</table>";
?>