<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/cliente.php");
    require_once("../modelos/bd.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkUser($id);
    ?>

    <main>
    <div class="container">
            <!-- Aquí se cargará la imagen -->
        </div>

        
        <!--============================================ SEGUNDA API============================================ -->
        <div class="container mt-5">
            <h1 class="text-center mb-4">Traduce aquí tus mensajes</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <textarea class="form-control inputText" rows="4" placeholder="Escribe el texto que deseas traducir"></textarea>
                </div>
                <div class="col-md-5">
                    <!-- <h3 class="text-center mt-5">Translated Text</h3> -->
                    <textarea id="output" class="form-control inputText" rows="4" placeholder="Aquí tu traducción"></textarea>
                    <!-- <div id="output" class=" p-3 inputText"></div> -->
                </div>
                <div class="col-md-5">
                    <button onclick="translateText()" class="btn btn-light btn-lg w-100 mt-3">Translate</button>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script>
            // URL de la API de Unsplash para obtener una foto aleatoria
            const apiUrl = 'https://api.unsplash.com/photos/random';

            // Tu Access Key de Unsplash
            const accessKey = 'PrMwLq8nr2MHSBQ955tcWKODp1uGt0uawcdg_J-8mBU';

            // Parámetros de la solicitud
            const params = {
                headers: {
                    'Authorization': `Client-ID ${accessKey}`
                }
            };

            // Realizar la solicitud a la API
            fetch(apiUrl, params)
                .then(response => response.json())
                .then(data => {
                    // Procesar la respuesta de la API
                    console.log(data);
                    // Mostrar la foto en tu aplicación
                    const imageUrl = data.urls.regular; // URL de la foto aleatoria
                    const container = document.querySelector('.container');
                    const imageElement = document.createElement('img');
                    imageElement.src = imageUrl;
                    container.appendChild(imageElement);
                })
                .catch(error => {
                    console.error('Error al hacer la solicitud:', error);
                });
        </script>  -->
    <script>
        function translateText() {
            const inputText = document.querySelector('.inputText').value;
            // Introduce tu API KEY en las comillas
            const apiKey = '';
            const targetLanguage = 'es';

            // Detectar automáticamente el idioma de origen
            fetch(`https://translation.googleapis.com/language/translate/v2/detect?key=${apiKey}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        q: inputText
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const sourceLanguage = data.data.detections[0][0].language;
                    // Traducción al español
                    fetch(`https://translation.googleapis.com/language/translate/v2?key=${apiKey}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                q: inputText,
                                source: sourceLanguage,
                                target: targetLanguage
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const translatedText = data.data.translations[0].translatedText;
                            document.getElementById('output').innerText = translatedText;
                        })
                        .catch(error => console.error('Error:', error));
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <?php pintarFooter(); ?>
</body>

</html>