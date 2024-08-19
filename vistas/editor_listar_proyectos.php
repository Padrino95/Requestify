<section class="container mt-5 table-responsive">
    <?php
    echo "
    <table class='table table-bordered table-dark table-striped'>
        <thead>
            <tr>
                <th scope='col'>Cod</th>
                <th scope='col'>Título</th>
                <th scope='col'>Inicio</th>
                <th scope='col'>Estado</th>
                <th scope='col'>Cliente</th>
                <th scope='col'>Ver</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($proyectos as  $value) {
        echo "
        <tr>
        <td> $value[cod] </td>
        <td> $value[titulo] </td>
        <td> $value[f_inicio] </td>
        <td> $value[estado] </td>
        ";
        $cliente= new cliente();
        $nombre= $cliente->nombreClienteId($value["id_cliente"]);
        echo"<td> $nombre[nick] </td>
        <td class='text-center'><a href='../controladores/editor_proyecto.php?cod=$value[cod]&cliente=$nombre[nick]&titulo=$value[titulo]&nick=$_SESSION[nick]&id_cliente=$value[id_cliente]&puntos=$value[puntos]&comentario=$value[comentario]&estado=$value[estado]'>
            <button class='btn btn-warning' name='modificarEditor'>Ver</button>
            </a>
        </td>
        
    </tr>
        ";
    }
    echo "
    </tbody>
    </table>
    ";


    ?>
</section>