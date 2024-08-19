<section class="container mt-5 text-center">
    <h2 class="text-center mb-4 mt-4">Mis Contratos</h2>
    <div class="row">
        <?php
        echo "
        <div class='col-md-12'>
            <div class='card border-primary divProyectoOscuro'>
                <div class='card-body'>
                    <h5 class='card-title'>$contratos[nombrePlan]</h5>
                    <p class='card-text'>Peticiones: $contratos[peticiones]</p>
                    <p class='card-text'>Precio: $contratos[precio]€</p>
                    <a href='../controladores/cliente_listar_contratos.php?num=$contratos[num]' class='btn btn-danger'>Eliminar</a>
                </div>
            </div>
        </div>";
        ?>
    </div>
</section>
