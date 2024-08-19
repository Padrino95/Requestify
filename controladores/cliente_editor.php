<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/editor.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/multimedia.php");

    $id = checkLoggin();
    pintaMenu($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////MOSTRAR EDITOR/////////////////////////////////
        $editor = new editor();
        $editores = $editor->buscarEditorPorId($_GET['id']);
        $multimedia= new multimedia();
        $fotos= $multimedia->fotosEditor($_GET['id']);
        include("../vistas/cliente_editor.php");
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>