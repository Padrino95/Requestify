<?php
include("../vistas/head.html");
?>

<body>
    <main>
        <?php
        require_once("../Funciones/funciones.php");
        require_once("../modelos/bd.php");
        require_once("../modelos/proyecto.php");
        require_once("../modelos/cliente.php");
        require_once("../modelos/editor.php");
        $id = checkLoggin();
        pintaMenu($id);
        checkUser($id);


        $editor = new editor();
        $info = $editor->buscarEditorPorId($_SESSION['id']);
        include("../vistas/editor_info.php");

        $proyecto = new proyecto();
        $proyectos = $proyecto->listarProyectosEditor($_SESSION["id"]);
        if (!$proyectos) {
        ?>
            <script>
                alert("No tienes proyectos");
            </script>
        <?php
        } else {
            include("../vistas/editor_listar_proyectos.php");
        }


        ?>


    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>