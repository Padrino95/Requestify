<section class="container-fluid mt-5 pt-5 proyectoMesIndex">
    <h2 class="text-center my-5">Último proyecto del editor del mes</h2>
    <div class="row d-flex justify-content-center">
        <?php
            foreach ($fotos as $foto) {
                echo "<div class='col-md-3 fotosIndex'>";
                if ($id == $cliente['id_cliente']) {
                    echo"<a href='./controladores/cliente_proyecto.php?cod=$ultimoProyecto[cod]&descripcion=$cliente[descripcion]&cod_editor=$cliente[cod_editor]&titulo=$cliente[titulo]'>
                        <img src='./assets/imagenes/proyectos/$foto[ruta]' class='img-fluid'>
                    </a>";
                }else{
                    echo"<a href='./controladores/usuario_proyecto.php?proyecto=$ultimoProyecto[cod]'>
                        <img src='./assets/imagenes/proyectos/$foto[ruta]' class='img-fluid'>
                    </a>";
                }
                echo "</div>";
            }
        ?>
    </div>
</section>
