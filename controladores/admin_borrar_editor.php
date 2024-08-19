<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/editor.php");
    require_once("../modelos/bd.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkAdmin($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////BORRAR EDITORES/////////////////////////////////
        if (isset($_GET['id'])) {
            $editor = new editor();
            $editores= $editor->borrarEditor($_GET["id"]);
            header("refresh:0; url=../controladores/admin_listar_editores.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>