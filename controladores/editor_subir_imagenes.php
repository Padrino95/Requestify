<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/multimedia.php");
    require_once("../modelos/proyecto.php");
    require_once("../modelos/editor.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkUser($id);
    ?>

    <main>
        <?php
        $proyecto = $_GET["proyecto"];
        if (isset($_POST['añadir'])) {


            $multimedia = new multimedia();
            $cantidadRaw= $multimedia->numeroImagenes($proyecto);
            // Insertar varias imagenes
            $cantidad = count($_FILES["fotos"]["tmp_name"]);
            for ($i = 0; $i < $cantidad; $i++) {
                if ($_FILES['fotos']['type'][$i] == 'image/png' || $_FILES['fotos']['type'][$i] == 'image/jpeg') {
                    $info = pathinfo($_FILES["fotos"]["name"][$i]);
                    $extension = $info['extension'];

                    $numero=$cantidadRaw['total']+$i;
                    $id = "$proyecto.$numero";
                    move_uploaded_file($_FILES["fotos"]["tmp_name"][$i], "../assets/imagenes/proyectos/$id.$extension");
                    $ruta = "$id.$extension";
                    $multimedia2 = new multimedia();
                    $multimedia2->insertarEditada($ruta, $proyecto);
                }
            }
            header("Location:../controladores/editor_listar_proyectos.php");



            // // Procesamiento imagen
            // $info = pathinfo($_FILES['imagen']['name']);
            // $extension = $info['extension'];

            // $multimedia = new multimedia();
            // $id = $proyecto;
            // move_uploaded_file($_FILES['imagen']['tmp_name'], "../assets/imagenes/proyectos/$id.$extension");
            // $ruta = "$id.$extension";
            // print_r($ruta);

            // $multimedia->insertarEditada($ruta, $proyecto);
            // header("refresh:0; url=../controladores/editor_proyecto.php");
        } else {
            include("../vistas/editor_subir_imagenes.php");
            // header("Location: ../controladores/editor_proyecto.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../controladores/traduccion.js"></script>
</body>

</html>