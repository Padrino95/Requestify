<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/cliente.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/multimedia.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkUser($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////Editar perfil/////////////////////////////////
        if (isset($_POST['enviar'])) {
            $cliente = new cliente();
            $cliente->modificarCliente($_SESSION['id'], $_POST['nombre'], $_POST['telefono'], $_POST['nick'], $_POST['contrasena']);
            ?>
            <script>
                alert("Datos modificados correctamente");
            </script>
        <?php
            header("refresh:0; url=../controladores/cliente_listar_contratos.php");
        } else {
            $cliente=new cliente();
            $info= $cliente->buscarClientePorId($_SESSION['id']);
            include("../vistas/cliente_editar_perfil.php");
        }

        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>