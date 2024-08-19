<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/proyecto.php");
    require_once("../modelos/editor.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/contrato.php");
    require_once("../modelos/multimedia.php");

    $id = checkLoggin();
    pintaMenu($id);
    checkUser($id);
    ?>

    <main>
        <?php
        $contrato1 = new contrato();
        $contrato1 = $contrato1->contratoActivo($_SESSION['id']);

        $contrato2 = new contrato();
        $peticionesContrato = $contrato2->peticionesContrato($_SESSION['id']);
        $proyecto3 = new proyecto();
        $proyectosContrato = $proyecto3->proyectosContrato($_SESSION['id']);
        $resta = $peticionesContrato - $proyectosContrato;

        if ($contrato1 == -1) {
            echo "<script>function mostrarAlerta() {
                alert('Actualmente no tienes ningun contrato activo para iniciar un proyecto');
            }
            mostrarAlerta();</script>";
            header("Refresh:0; url=../controladores/usuario_listar_planes.php ");
        } elseif ($resta < 1) {
            echo "<script>
                alert('Has superado el número máximo de peticiones para tu contrato. Contrate uno superior o espere al mes siguiente.');
                window.location.href = '../controladores/cliente_listar_contratos.php';
            </script>";
            // Esto hace que el script se pare y no siga ejecutandose
            exit();
        } else {
            if (isset($_POST['añadir'])) {
                $contrato = new Contrato();
                $contrato = $contrato->contratoActivo($_SESSION['id']);
                $idContrato = $contrato[0]['num'];

                $proyecto = new Proyecto();
                $proyecto->insertarProyecto($_POST["titulo"], $_POST["descripcion"], $idContrato, $_SESSION["id"], $_POST["editor"]);
                // Insertar varias imagenes
                $cantidad = count($_FILES["fotos"]["tmp_name"]);
                for ($i = 0; $i < $cantidad; $i++) {
                    if ($_FILES['fotos']['type'][$i] == 'image/png' || $_FILES['fotos']['type'][$i] == 'image/jpeg') {
                        $info = pathinfo($_FILES["fotos"]["name"][$i]);
                        $extension = $info['extension'];
                        $proyecto2 = new Proyecto();
                        $ultimoProyecto = $proyecto2->ultimoProyectoCliente($_SESSION["id"]);
                        $id = "$ultimoProyecto[cod].$i";
                        move_uploaded_file($_FILES["fotos"]["tmp_name"][$i], "../assets/imagenes/proyectos/$id.$extension");
                        $ruta = "$id.$extension";
                        $multimedia = new multimedia();
                        $multimedia->insertarMultimediaRaw($ruta, $ultimoProyecto["cod"]);
                    }
                }
                header("Location:../controladores/cliente_marcar_favorita.php?proyecto=$ultimoProyecto[cod]");
                // header("Location:../controladores/cliente_listar_contratos.php");
            } elseif (isset($_GET['nuevo'])) {
                $editor = new editor();
                $editores = $editor->listarEditores();
                include("../vistas/cliente_nuevo_proyecto.php");
            }
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>