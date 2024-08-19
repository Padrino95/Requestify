<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/styles/style.css" rel="stylesheet">
    <title>Acceder</title>
</head>

<body>
    <?php
    
    if (isset($_GET["error"])) {
        if ($_GET["error"] == 1) {
            echo"<script>function mostrarAlerta() {
                alert('Debes introducir todos los datos correctamente');
            }
            mostrarAlerta();</script>";
            // header("Refresh:2; url=../Vistas/acceso.php");
        } elseif ($_GET["error"] == 2) {
            echo"<script>function mostrarAlerta() {
                alert('Usuario o contraseña incorrectos');
            }
            mostrarAlerta();</script>";
            // header("Refresh:2; url=../Vistas/acceso.php");
        }
    }
    ?>
    <main>
        <section class="container form-signin pt-5">
            <div class="row justify-content-center">
                <form action="../Controladores/control_acceso.php" method="post" class=" formG col-lg-4 col-md-6 col-sm-8 px-4">
                    <div class="text-center">
                        <img class="mb-2 img-fluid" src="../assets/imagenes/acceso/logo.png">
                        <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control mb-2" id="floatingInput" name="nick" placeholder="Usuario">
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>

                    <div class="checkbox mb-3 mt-3">
                        <label>
                            <input type="checkbox" value="remember-me" name="recordar"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg enviar" type="submit" name="enviar">Sign in</button>
                    <p class="mt-5 mb-3 text-center">© 2024</p>
                </form>
            </div>
            <div class="container mt-3 d-flex justify-content-center align-items-center">
                <a href="../index.php" class="text-center me-3">
                    <button class="btn btn-lg btn-custom" name="añadirLanzamiento">Volver</button>
                </a>
                <a href="../controladores/registro.php" class="text-center">
                    <button class="btn btn-lg btn-custom" name="registro">Registro</button>
                </a>
            </div>
            
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
