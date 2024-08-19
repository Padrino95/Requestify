<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/editor.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/estilo.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkAdmin($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////INSERTAR EDITORES/////////////////////////////////
        if (isset($_GET["error"])) {
        ?>
            <script>
                alert("Debes rellenar todos los datos")
            </script>
        <?php
            header("refresh:0; url=./admin_insertar_editor.php");
        } elseif (isset($_POST['enviar'])) {
            $nombre = trim($_POST['nombre']);
            $nick = trim($_POST['nick']);
            $pass = trim($_POST['contrasena']);

            if ($nombre != "" && $nick != "" && $pass != "" && $_POST["presentacion"] != "") {
                // Procesamiento imagen
                $info = pathinfo($_FILES['imagen']['name']);
                $extension = $info['extension'];

                $editor = new editor();
                $id = $editor->siguienteEditor();
                move_uploaded_file($_FILES['imagen']['tmp_name'], "../assets/imagenes/editores/$id.$extension");
                $ruta = "$id.$extension";

                $editor->insertarEditor($nombre, $nick, $_POST["presentacion"], $ruta, $_POST["tipo"], $pass,$_POST["estilo"]);
                header("refresh:0; url=../controladores/admin_listar_editores.php");
            } else {
                header("refresh:0; url=./admin_insertar_editor.php?error=1");
            }
        } else {
            $estilo= new estilo();
            $estilos=$estilo->listarEstilos();
            include("../vistas/admin_insertar_editor.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>