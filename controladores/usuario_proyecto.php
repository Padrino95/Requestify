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
    ?>

    <main>
        <?php
        $proyecto = new proyecto();
        $info = $proyecto->listarProyecto($_GET["proyecto"]);
        $multimedia = new multimedia();
        $destacada = $multimedia->imagenDestacadaProyecto($_GET['proyecto']);
        $multimedia2 = new multimedia();
        $fotos = $multimedia2->listarFotosProyectoRaw($_GET['proyecto']);
        $editor = new editor();
        $nombre = $editor->buscarEditorPorId($info['cod_editor']);
        include('../vistas/usuario_proyecto.php');
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>