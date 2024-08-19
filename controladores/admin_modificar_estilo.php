<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/estilo.php");
    require_once("../modelos/bd.php");

    $id = checkLoggin();
    checkAdmin($id);
    pintaMenu($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////MODIFICAR ESTILOS/////////////////////////////////
        if (isset($_GET["error"])) {
        ?>
            <script>
                alert("Debes rellenar todos los datos correctamente")
            </script>
        <?php
            header("refresh:0; url=./admin_listar_estilos.php");
        } elseif (isset($_POST['enviar'])) {
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);


            if ($nombre != "" && $descripcion != "") {
                $estilo = new estilo();
                $estilos = $estilo->modificarEstilo($_POST["id"], $nombre, $descripcion);
                header("refresh:0; url=../controladores/admin_listar_estilos.php");
            } else {
                header("refresh:0; url=./admin_modificar_estilo.php?error=1");
            }
        } else {
            include("../vistas/admin_modificar_estilo.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>