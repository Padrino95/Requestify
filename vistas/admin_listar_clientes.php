<section class="container mt-5">
    <?php
    
echo "
<div class='container mt-5'>
    <form action='../controladores/admin_buscar_cliente.php' method='POST'>
        <div class='mb-3'>
            <label for='nombre' class='form-label'>Buscar por Nombre:</label>
            <input type='text' class='form-control' name='nombre'>
        </div>
        <button type='submit' class='btn btn-primary' name='enviarBuscarCliente'>Buscar</button>
    </form>
</div>

<div class='container mt-3 d-flex justify-content-star align-items-center'>
    <a href='../controladores/admin_insertar_cliente.php'>
        <button class='btn btn-success' name='añadirCliente'>Añadir</button>
    </a>
</div>";
    ?>
</section>
<section class="container mt-5 table-responsive">
    <?php
    echo "
    <table class='table table-bordered table-dark table-striped'>
        <thead>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Nick</th>
                <th scope='col'>Telefono</th>
                <th scope='col'>Modificar</th>
                <th scope='col'>Borrar</th>
            </tr>
        </thead>
        <tbody>
    ";
    foreach ($clientes as  $value) {
        echo "
        <tr>
        <td> $value[id] </td>
        <td> $value[nombre] </td>
        <td> $value[nick] </td>
        <td> $value[telefono] </td>
        <td><a href='../controladores/admin_modificar_cliente.php?id=$value[id]&nombre=$value[nombre]&nick=$value[nick]&telefono=$value[telefono]'>
                <button class='btn btn-warning' name='modificarCliente'>Modificar</button>
            </a>
        </td>
        <td><a href='../controladores/admin_borrar_cliente.php?id=$value[id]'>
                <button class='btn btn-danger' name='borrarCliente'>Borrar</button>
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