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
        if (isset($_GET['cod'])) {
            $multimedia = new multimedia();
            $fotos = $multimedia->listarFotosProyectoRaw($_GET['cod']);
            $proyecto4 = new proyecto();
            $info = $proyecto4->listarProyecto($_GET["cod"]);
            include("../vistas/editor_proyecto.php");
        } else {
            header("Location: ../controladores/cliente_listar_proyectos.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../controladores/traduccion.js"></script>
</body>

</html>