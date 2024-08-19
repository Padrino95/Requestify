<section class="container mt-5 table-responsive">
    <?php
    echo "
    <h2 class='text-center my-4'>Estilos disponibles</h2>
    <a class='btn btn-light mb-4' href='../controladores/api.php'>Añadir estilo</a>
    <table class='table table-bordered table-dark table-striped'>
        <thead>
            <tr>
                <th scope='col'>Cod</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Descripcion</th>
                <th scope='col'>Modificar</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($estilos as  $value) {
        echo "
        <tr>
        <td> $value[cod] </td>
        <td> $value[nombre] </td>
        <td> $value[descripcion] </td>
        <td><a href='../controladores/admin_modificar_estilo.php?id=$value[cod]&nombre=$value[nombre]&descripcion=$value[descripcion]'>
                <button class='btn btn-warning' name='modificarCliente'>Modificar</button>
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