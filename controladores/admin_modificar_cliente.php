<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/cliente.php");
    require_once("../modelos/bd.php");

    $id = checkLoggin();
    checkAdmin($id);
    pintaMenu($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////MODIFICAR CLIENTES/////////////////////////////////
        if (isset($_GET["error"])) {
        ?>
            <script>
                alert("Debes rellenar todos los datos correctamente")
            </script>
        <?php
            header("refresh:0; url=./admin_insertar_cliente.php");
        } elseif (isset($_POST['enviar'])) {
            $nombre = trim($_POST['nombre']);
            $nick = trim($_POST['nick']);
            $pass = trim($_POST['contrasena']);
            $telefono = trim($_POST['telefono']);


            if ($nombre != "" && $nick != "" && $pass != "" && $pass != $_GET['contrasena']) {
                $cliente = new cliente();
                $clientes = $cliente->modificarCliente($_POST["id"], $nombre, $telefono, $nick, $pass);
                header("refresh:0; url=../controladores/admin_listar_clientes.php");
            } else {
                header("refresh:0; url=./admin_modificar_cliente.php?error=1");
            }
        } else {
            include("../vistas/admin_modificar_cliente.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>