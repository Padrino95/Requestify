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
        <!-- ==============================================Unplash API======================================== -->
        <div class="container-fluid m-0 p-0">
            <!-- Aquí se cargará la imagen -->
        </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // URL de la API de Unsplash para obtener una foto aleatoria
        const apiUrl = 'https://api.unsplash.com/photos/random?orientation=landscape';

        //Clave
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
                // Mostrar la foto
                const imageUrl = data.urls.regular;
                const container = document.querySelector('.container');
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;
                imageElement.style.width = '100%';
                imageElement.style.height = '875px';
                container.appendChild(imageElement);
            })
            .catch(error => {
                console.error('Error al hacer la solicitud:', error);
            });
    </script>
    <script>
        function translateText() {
            const inputText = document.querySelector('.inputText').value;
            const apiKey = 'AIzaSyCLjtiyTp-6mFGzbHRQtBFg1Yw4Q9zbKSs';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>