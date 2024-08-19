<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api prueba</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Rellene los datos para añadir un nuevo estilo</h1>
        <h2 class="text-center" id="respuesta"></h2>
        <form class="col-md-5 m-auto mt-5">
            <div class="mb-3">
                <label for="nombreEstilo" class="form-label">Nombre del estilo</label>
                <input type="text" class="form-control inputText" id="nombreEstilo" placeholder="Escribe el nombre del estilo">
            </div>
            <div class="mb-3">
                <label for="descripcionEstilo" class="form-label">Descripción del estilo</label>
                <textarea class="form-control inputText" rows="4" id="descripcionEstilo"
                    placeholder="Escribe la descrición del estilo"></textarea>
                <!-- <input type="text" class="form-control" id="descripcionEstilo"> -->
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="../Index.php" class="btn btn-dark">Volver</a>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        let form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            let nombreEstilo = document.getElementById('nombreEstilo').value;
            console.log(nombreEstilo);
            let descripcionEstilo = document.getElementById('descripcionEstilo').value;
            console.log(descripcionEstilo);

            fetch('prueba.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    nombre: nombreEstilo,
                    descripcion: descripcionEstilo
                }),
            })
                .then(response => response.json())
                .then(data => {
                    const respuesta = document.getElementById('respuesta');
                    respuesta.textContent = data.mensaje;
                    window.location.href = '../controladores/admin_listar_estilos.php';

                })
                .catch((error) => {
                    console.error('Error:', error);
                });
                nombreEstiloInput.value = '';
                    descripcionEstiloInput.value = '';
        });
    </script>
</body>

</html>