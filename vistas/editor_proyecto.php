<section class="container-fluid m-0 p-0">
    <div id="carouselExampleControls" class="carousel slide">
        <div class="carousel-inner">
            <?php
            $primeraFoto = true;
            foreach ($fotos as $foto) {
                if ($primeraFoto) {
                    echo "<div class='carousel-item active'>
                            <a href='../controladores/download.php?file=$foto[ruta]'>
                                <img src='../assets/imagenes/proyectos/$foto[ruta]' class='d-block w-100'>
                            </a>
                        </div>";
                    $primeraFoto = false;
                } else {
                    echo "<div class='carousel-item'>
                            <a href='../controladores/download.php?file=$foto[ruta]'>
                                <img src='../assets/imagenes/proyectos/$foto[ruta]' class='d-block w-100'>
                            </a>
                        </div>";
                }
            }
            ?>
        </div>
        <!-- Controles de navegación -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>




<section class="container-fluid m-0 p-0">
    <div class="row text-center d-flex justify-content-center mx-1 mt-0">
        <div class="card divProyectoClaro">
            <h2 class="mt-5 text-center">Detalles del Proyecto</h2>
            <div class="card-body">
                <h5 class="card-title"><?php echo $_GET['titulo'] ?></h5>

                <p class="card-text"><small class="text-muted">Cliente: <?php echo $_GET['cliente'] ?></small></p>
                <?php
                if ($_GET['puntos'] != NULL) {
                    echo "<p class='card-text'><small class='text-muted'>El cliente te ha valorado con un : ";
                    $puntos = $info['puntos'];
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $puntos) {
                            echo '<i class="fas fa-star"></i>'; // Estrella llena
                        } else {
                            echo '<i class="far fa-star"></i>'; // Estrella vacía
                        }
                    }
                    echo "</small></p>";
                    echo "<p class='card-text'><small class='text-muted'>Comentario: $_GET[comentario]</small></p>";
                }
                ?>
            </div>
            <?php
            if ($_GET['estado'] == 'A') {
            ?>
                <div class="col-md-3 m-auto mb-3">
                    <a href="../controladores/editor_subir_imagenes.php?proyecto=<?php echo $_GET['cod'] ?>">
                        <button class="btn btn-dark btn-lg w-75 mt-3">Subir fotos editadas</button>
                    </a>
                </div>
                <div class="col-md-3 m-auto mb-3">
                    <a href="../controladores/finalizar_proyecto.php?proyecto=<?php echo $_GET['cod'] ?>">
                        <button class="btn btn-dark btn-lg w-75 mt-3">Finalizar proyecto</button>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<section class="container mt-5 pt-5">
    <h2 class="mt-5 pt-5">Mensajes</h2>
    <div class="list-group mb-3 custom-list-group" style="max-height: 300px; overflow-y: auto;">

    </div>


    <h2 class="mt-4">Enviar nuevo mensaje</h2>
    <form id="formEnviarMensaje">
        <div class="mb-1">
            <label for="contenidoMensaje" class="form-label"></label>
            <textarea class="form-control mb-3 inputText" id="contenidoMensaje" name="contenido" rows="10" required></textarea>
        </div>
        <input type="hidden" id="proyecto" name="proyecto" value="<?php echo $_GET['cod']; ?>">
        <input type="hidden" id="editor" name="editor" value="<?php echo $_SESSION['id']; ?>">
        <input type="hidden" id="cliente" name="cliente" value="<?php echo $_GET['id_cliente']; ?>">
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







<!--============================================ Insertar mensajes API============================================ -->
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