<section class="container">
    <h2 class="mt-5 text-center mb-3 pt-5">Detalles del Proyecto</h2>
    <div class="card mb-1 divProyectoClaro">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_GET['titulo'] ?></h5>
            <?php
            // Dividir la descripcion en párrafos
            $parrafos = explode("\n", $_GET["descripcion"]);
            foreach ($parrafos as $parrafo) {
                // Imprimir cada párrafo en un elemento <p>
                echo "<p>$parrafo</p>";
            }
            ?>
            <p class="card-text"><small class="text-muted">Editor: <?php echo $nombre['nombre'] ?></small></p>
        </div>
    </div>
    <div class="card mb-3">
        <img src="../assets/imagenes/proyectos/<?php echo $destacada['ruta']; ?>" class="img-fluid" id="ejemplo" alt="iamgen destacada del proyecto">
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php
        foreach ($fotos as $foto) {
        ?>
            <div class="col">
                <div class="card">
                    <a href="../controladores/download.php?file=<?php echo $foto['ruta']; ?>">
                        <img src="../assets/imagenes/proyectos/<?php echo $foto['ruta']; ?>" class="card-img-top fixed-size-img" alt="Imagen del proyecto">
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- ===================================================================FOTOS EDITADAS================================================================== -->




<?php 
  if ($editadas) {
?>
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Imágenes editadas</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
          $total_imagenes = count($editadas);
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
              echo'<a href="../controladores/download.php?file='.$editadas[$imagen_index]['ruta'].'">';
              echo '<img src="../assets/imagenes/proyectos/' . $editadas[$imagen_index]['ruta'] . '" class="d-block w-100 img-fluid" alt="Imagen ' . ($imagen_index + 1) . '">';
              echo"</a>";
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




<section class="container mt-5">
    <h2>Mensajes</h2>
    <div class="list-group mb-3" style="max-height: 300px; overflow-y: auto;">

    </div>


    <h2 class="">Enviar nuevo mensaje</h2>
    <form id="formEnviarMensaje">
        <div class="mb-3">
            <label for="contenidoMensaje" class="form-label">Contenido</label>
            <textarea class="form-control inputText" id="contenidoMensaje" name="contenido" rows="10" required></textarea>
        </div>
        <input type="hidden" id="proyecto" name="proyecto" value="<?php echo $_GET['cod']; ?>">
        <input type="hidden" id="editor" name="editor" value="<?php echo $_GET['cod_editor']; ?>">
        <input type="hidden" id="cliente" name="cliente" value="<?php echo $_SESSION['id']; ?>">
        <input type="hidden" id="nick" name="nick" value="<?php echo $_SESSION['nick']; ?>">
        <input type="hidden" id="idRemitente" name="idRemitente" value="<?php echo $_SESSION['id']; ?>">
        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
    </form>
</section>
<!--============================================ Trauctor API============================================ -->
<section class="container mt-5">
    <h2 class=" mb-4">Traduce aquí tus mensajes</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <textarea id="input" class="form-control inputText" rows="4" placeholder="Escribe el texto que deseas traducir"></textarea>
        </div>
        <div class="col-md-6">
            <textarea id="output" class="form-control inputText1" rows="4" placeholder="Aquí tu traducción"></textarea>
        </div>
        <div class="col-md-6">
            <button onclick="translateText()" class="btn btn-light btn-lg w-100 mt-3">Traducir</button>
        </div>
    </div>
</section>




<!-- ==================================================================== -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('formEnviarMensaje');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            let areaMensaje = document.getElementById('contenidoMensaje');
            let contenido = document.getElementById('contenidoMensaje').value;
            let proyectoM = document.getElementById('proyecto').value;
            let editorM = document.getElementById('editor').value;
            let clienteM = document.getElementById('cliente').value;
            let nickM = document.getElementById('nick').value;
            let idRemitente = document.getElementById('idRemitente').value;

            fetch('../controladores/insertar_mensaje.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        texto: contenido,
                        proyecto: proyectoM,
                        editor: editorM,
                        cliente: clienteM,
                        nick: nickM,
                        idRemitente: idRemitente
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.mensaje);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            areaMensaje.value = '';
        });


        let cajaMensajes = document.querySelector('.list-group');

        function peticionApiListar() {
            let proyectoM = document.getElementById('proyecto').value;
            fetch('../controladores/listar_mensaje.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        proyecto: proyectoM
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    cajaMensajes.innerHTML = '';


                    if (data.length < 1) {
                        let mensajeVacio = document.createElement('div');
                        mensajeVacio.classList.add('list-group-item');
                        mensajeVacio.textContent = 'No hay mensajes disponibles';
                        cajaMensajes.appendChild(mensajeVacio);
                    } else {




                        data.forEach(mensaje => {
                            console.log(mensaje);
                            let cajaMensaje = document.createElement('div');
                            if (mensaje.session_id == mensaje.id_Remitente) {
                                cajaMensaje.classList.add('list-group-item', 'custom-list-group-item', 'text-end');
                            } else {
                                cajaMensaje.classList.add('list-group-item', 'custom-list-group-item');
                            }

                            let h5 = document.createElement('h5');
                            h5.classList.add('mb-1');
                            h5.textContent = "Enviado por: " + mensaje.remitente;
                            cajaMensaje.appendChild(h5);

                            let texto = document.createElement('p');
                            texto.classList.add('mb-1');
                            texto.textContent = mensaje.texto;
                            cajaMensaje.appendChild(texto);

                            let fecha = document.createElement('small');
                            fecha.classList.add('text-muted', 'custom-small')
                            fecha.textContent = "Enviado el: " + mensaje.fecha + " a las: " + mensaje.hora;
                            cajaMensaje.appendChild(fecha);


                            cajaMensajes.appendChild(cajaMensaje);
                            // console.log(mensaje.texto);
                        });
                    }
                    // Desplaza el scroll para mostrar el último mensaje
                    cajaMensajes.scrollTop = cajaMensajes.scrollHeight;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        };




        peticionApiListar();

        setInterval(peticionApiListar, 1000);



    });
</script>