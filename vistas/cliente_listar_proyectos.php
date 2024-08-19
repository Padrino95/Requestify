<section class='container mt-3 d-flex justify-content-start align-items-center'>
    <a href='../controladores/cliente_nuevo_proyecto.php?nuevo' class="w-100">
        <button class='btn btn-success btn-lg btn-block' name='añadirCliente'>Iniciar nuevo proyecto</button>
    </a>
</section>
<section class='container mt-3 d-flex justify-content-start align-items-center'>
    <a href='../controladores/cliente_editar_perfil.php' class="w-100">
        <button class='btn btn-success btn-lg btn-block' name='editarPerfil'>Editar mi perfil</button>
    </a>
</section>

<section class="container">
    <h2 class="mt-5">Mis proyectos</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
        <?php
        foreach ($proyectos as $proyecto) {
        ?>
            <div class="col">
                <div class="card h-100 divProyectoOscuro position-relative">
                    <?php
                    $multimedia = new multimedia();
                    $destacada = $multimedia->imagenDestacadaProyecto($proyecto["cod"]);
                    ?>
                    <a href="../controladores/cliente_proyecto.php?cod=<?php echo urlencode($proyecto['cod']); ?>&descripcion=<?php echo urlencode($proyecto['descripcion']); ?>&cod_editor=<?php echo urlencode($proyecto['cod_editor']); ?>&titulo=<?php echo urlencode($proyecto['titulo']); ?>&nick=<?php echo urlencode($_SESSION['nick']); ?>">
                        <img src="../assets/imagenes/proyectos/<?php echo $destacada['ruta'] ?>" class="card-img-top fixed-size-img" alt="Imagen del proyecto">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $proyecto['titulo']; ?></h2>
                        <p class="card-text"><small class="text-muted">Fecha de Inicio: <?php echo date('d/m/Y', strtotime($proyecto['f_inicio'])); ?></small></p>
                        <p class="card-text"><?php echo htmlspecialchars(substr($proyecto['descripcion'], 0, 500)); ?></p>
                        <?php
                        $editor = new editor();
                        $nombre = $editor->buscarEditorPorId($proyecto['cod_editor']);
                        ?>
                        <p class="card-text"><small class="text-muted">Editor asignado: <?php echo $nombre["nombre"]; ?></small></p>
                        <?php
                        if ($proyecto["estado"] == 'A') {
                            echo "<p class='card-text'><small class='text-muted'>Estado del proyecto: Activo</small></p>";
                        } else {
                            echo "<p class='card-text'><small class='text-muted'>Estado del proyecto: Finalizado</small></p>";
                            if ($proyecto['puntos'] == NULL) {
                                echo "<a href='../controladores/cliente_puntuar.php?proyecto=$proyecto[cod]' class='btn-puntuar'>
                                    <button class='btn btn-warning btn-lg' name='añadirCliente'>Puntuar</button>
                                  </a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>