<?php
include("../vistas/head.html");
?>

<body>
    <main>
        <?php
        require_once("../Funciones/funciones.php");
        require_once("../modelos/bd.php");
        require_once("../modelos/proyecto.php");

        $id = checkLoggin();
        pintaMenu($id);
        checkUser($id);


        if (isset($_GET['proyecto'])) {
            include("../vistas/cliente_puntuar.php");
        }elseif (isset($_POST['puntuar'])) {
            $proyecto= new proyecto();
            $proyecto->puntuarProyecto($_POST['cod'], $_POST['puntuacion'], $_POST['comentario']);
            echo "<script>function mostrarAlerta() {
                alert('Valoración enviada con éxito');
            }
            mostrarAlerta();</script>";
            header("refresh:1; url=../controladores/cliente_listar_contratos.php");
        }
        ?>


    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>