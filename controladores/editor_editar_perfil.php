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
    checkUser($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////MODIFICAR EDITORES/////////////////////////////////
        if (isset($_GET["error"])) {
        ?>
            <script>
                alert("Debes rellenar todos los datos correctamente")
            </script>
        <?php
            header("refresh:10; url=./editor_info.php");
        } elseif (isset($_POST['enviar'])) {
            $nombre = trim($_POST['nombre']);
            $nick = trim($_POST['nick']);
            $pass = trim($_POST['contrasena']);


            if ($nombre != "" && $nick != "" && $pass != "") {
                if ($_FILES['imagen']['error'] === UPLOAD_ERR_NO_FILE) {
                    $editor = new editor();
                    $editores = $editor->modificarEditorSinFoto($_SESSION["id"], $nombre, $_POST["presentacion"], $nick, $_POST["tipo"], $pass, $_POST["estiloE"]);
                    header("refresh:10; url=../controladores/editor_listar_proyectos.php");
                } else {
                    // Borramos la que habia
                    // unlink("../assets/imagenes/editores/$_POST[id].*");
                    // Procesamiento imagen
                    $info = pathinfo($_FILES['imagen']['name']);
                    $extension = $info['extension'];

                    $editor = new editor();
                    $ruta = "$_POST[id].$extension";

                    
                    move_uploaded_file($_FILES['imagen']['tmp_name'], "../assets/imagenes/editores/$_SESSION[id].$extension");

                    $editores = $editor->modificarEditor($_POST["id"], $nombre, $_POST["presentacion"], $nick, $_POST["tipo"], $ruta, $pass, $_POST['estiloE']);
                    header("refresh:20; url=../controladores/editor_listar_proyectos.php");
                }
            } else {
                header("refresh:10; url=./editor_editar_perfil.php?error=1");
            }
        } else {
            $estilo= new estilo();
            $estilos= $estilo->listarEstilos();
            include("../vistas/editor_modificar_perfil.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>