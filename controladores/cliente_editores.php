<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/editor.php");
    require_once("../modelos/estilo.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/multimedia.php");
    $id = checkLoggin();
    pintaMenu($id);
    ?>

    <main>
    <?php
    $editor= new editor();
    $fotosEditores=$editor->listarFotosEditores();

    $editor1= new editor();
    $editorMes= $editor1->editorMes();

    $multimedia= new multimedia ();
    $seisFotos= $multimedia->seisFotosEditor($editorMes['cod_editor']);

    $editor2= new editor();
    $fotoEditor= $editor2->buscarEditorPorId($editorMes['cod_editor']);

    include("../vistas/cliente_listarFotosEditores.php");

    $estilo= new estilo();
    $estilos=$estilo->listarEstilos();
    if(isset($_POST['enviarFiltrar'])){
        $editor3= new editor();
        $editores2= $editor3->filtrarPorEstilo($_POST['estilo']);
        include("../vistas/cliente_filtrado_editores.php");
    }
    include("../vistas/cliente_filtrar_estilos.php");
    ?>

    </main>
    
    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>