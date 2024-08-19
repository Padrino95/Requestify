<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./assets/styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <title>Requestify</title>
</head>

<body>
    <?php
    require_once("./Funciones/funciones.php");
    require_once("./modelos/proyecto.php");
    require_once("./modelos/bd.php");
    require_once("./modelos/editor.php");
    require_once("./modelos/multimedia.php");

    $id = checkLoggin();
    pintaMenuIndex($id);
    ?>
    <main>
        <!-- <div class="mb-5 pb-2"></div> -->
        <section class="container-fluid py-2 m0">
            <h5 class="text-center">Donde tus fotos cobran vida: Edición sin límites,</h5>
            <h5 class="text-center">creatividad infinita</h5>
        </section>
        <?php
        $editor = new editor();
        $editorMes = $editor->editorMes();
        $proyecto = new proyecto();
        $ultimoProyecto = $proyecto->ultimoProyecto($editorMes['cod_editor']);
        $proyecto5 = new proyecto();
        $cliente = $proyecto->listarProyecto($ultimoProyecto['cod']);
        $multimedia = new multimedia();
        $destacada = $multimedia->imagenDestacadaProyecto($ultimoProyecto['cod']);
        include('./vistas/destacadaIndex.php');
        ?>
        <section class="container-fluid p-0 m-0 pt-5 proyectoMesIndex">
            <div class="row m-0 p-0 d-flex justify-content-center">
                <h3 class="text-center">¿Cómo trabajan nuestro editores?</h3>
                <div class="col-md-9 mt-5 p-0">
                    <div class="video-container">
                    <iframe id="videoIndex" src="https://www.youtube.com/embed/DEkEpvG0wXc?si=GgDBnqLAOxxNukfe&amp;start=189&autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>    
                    <!-- <iframe id="videoIndex" src="https://www.youtube.com/embed/L_mHfZmtikM?si=5ula2cxFcX7TulZN&amp;start=394&autoplay=1&mute=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                    </div>
                </div>
            </div>
        </section>
        <?php
        $fotos = new multimedia();
        $fotos = $fotos->listar3FotosProyecto($ultimoProyecto['cod']);
        include('./vistas/index_fotos_proyecto.php');
        ?>
    </main>
    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>