<section class="container">
    <h2 class="text-center display-3 mb-5">Nuestros planes</h2>
    <div class="row d-flex justify-content-between planes">
        <?php
        foreach ($planes as $value) {
            echo "
        <div class='col-md-3 text-center p-5 border rounded-3 plan'>
            <div><img src='../assets/imagenes/planes/$value[foto]' class='img-fluid'></div>
            <h3 class='mt-4 fw-bolder'>$value[nombre]</h3>
            <p class='mt-4'>$value[descripcion]</p>
            <p class='mt-4'>Peticiones por mes</p>
            <p class='peticion mb-4 mt-4 fs-5'>$value[peticiones]</p>
            <h3 class='display-2'>$value[precio]€</h3>
            <a href='../controladores/cliente_contratar_plan.php?codigo=$value[codigo]'><button class='w-100 btn btn-lg enviar mt-3 hover'>Suscríbete</button></a>
        </div>";
        }
        ?>
    </div>
</section>



<section id="tabla" class="table-responsive">
    <h2>Compara planes de pago</h2>
    <table id="plan">
        <tr>
            <th></th>
            <th>Petición individual</th>
            <th>Suscripción básica</th>
            <th>Suscripción premium</th>
            <th>Suscripción deluxe</th>
        </tr>
        <tr class="hover">
            <td>Previsualización de edición</td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
        </tr>
        <tr class="hover">
            <td>Acceso a chat con editores</td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
        </tr>
        <tr class="hover">
            <td>Los precios más bajos en edición de imágenes</td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
        </tr>
        <tr class="hover">
            <td>Los precios más bajos en edición de video</td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
        </tr>
        <tr class="hover">
            <td>Peticiones ilimitadas de foto y vídeo</td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
        </tr>
        <tr class="hover">
            <td>Boards para organizar y compartir tus ediciones</td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
        </tr>
        <tr class="hover">
            <td>Previsualización de edición <span class="material-symbols-outlined"> share </span><span class="material-symbols-outlined">thumb_up</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">close</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
            <td><span class="material-symbols-outlined">check</span></td>
        </tr>
    </table>
</section>


<section id="faq" class="container">
    <h2 class="text-center mb-5 display-3">Preguntas Frecuentes</h2>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    ¿Por qué tengo que pagar por las imágenes y vídeos de stock si son libres de derechos?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    La palabra “libre” en libre de derechos no significa que las imágenes y vídeos se puedan usar de manera gratuita, sino que, después de pagar por una licencia una vez, puedes utilizar el contenido con la frecuencia que quieras sin pagarle al titular de derechos de autor una regalía cada vez que lo utilices. Con la licencia obtienes el derecho de usar el archivo —con una garantía legal que te protege por hasta 10.000 USD— y nuestros colaboradores cobran por el gran trabajo que realizan. Es una situación en la que todos ganan, y por eso todo lo que hay en iStock solo está disponible libre de derechos.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    ¿Debería comprar créditos o una suscripción?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Si tus necesidades de imágenes son difíciles de predecir, los
                    créditos son una gran alternativa. Compra solo lo suficiente
                    para las imágenes y clips de vídeo que necesitas o aprovisiónate
                    y ahorra en descargas futuras. Cuanto más compres, menos
                    costarán. Si descargas tan solo cuatro imágenes (fotos,
                    ilustraciones y vectores) o dos vídeos al mes, obtendrás la
                    mejor relación calidad-precio con una suscripción de iStock.
                    Gracias a los planes mensuales y anuales que ofrecemos, y a los
                    límites de descargas que van desde 10 a 750 archivos al mes,
                    puedes disfrutar de importantes ahorros sin contraer un gran
                    compromiso.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapseOne">
                    ¿Cuál es el periodo de validez de mis créditos?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Los créditos no caducan, siempre que inicies sesión en tu cuenta
                    al menos una vez al año.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapseOne">
                    ¿Cómo sé si necesito una licencia estándar o ampliada?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Cada archivo descargado de iStock incluye una licencia estándar
                    que te permite usarlo en una amplia variedad de formas. Desde
                    anuncios en redes sociales hasta vallas publicitarias,
                    presentaciones en PowerPoint y largometrajes, eres libre de
                    modificar, cambiar el tamaño y personalizar cada archivo de
                    iStock para que se ajuste a tus proyectos. Con la excepción de
                    las fotos de “Solo uso editorial” (que solo pueden ser
                    utilizadas en proyectos editoriales y no pueden ser
                    modificadas), las posibilidades son ilimitadas. Solo asegúrate
                    de que tus modificaciones no infrinjan el Contrato de licencia
                    de uso de contenidos.
                </div>
                <div class="accordion-body">
                    Sin embargo, si necesitas más de 500.000 impresiones, crear
                    productos para reventa o compartir archivos con varios usuarios,
                    tendrás que añadir una licencia ampliada a tu compra de
                    créditos. El coste de una licencia ampliada es de 18 créditos
                    para imágenes y 21 créditos para vídeos, además de tu licencia
                    estándar.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapseOne">
                    ¿Qué ocurre si no utilizo todas las descargas de mi suscripción
                    cada mes?
                </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    ​Tu suscripción te da acceso a un número establecido de
                    descargas cada mes. Puedes transferir hasta 250 descargas sin
                    utilizar de un mes a otro si adquiriste una suscripción anual o
                    una suscripción con renovación automática activada. Si la
                    renovación automática está desactivada cuando finalice el
                    período de tu suscripción, perderás todas las descargas
                    transferidas que hayas acumulado.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapseOne">
                    ¿Cómo puedo descargar archivos que no están disponibles con mi
                    suscripción?
                </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Si necesitas un archivo que no está disponible para descargar
                    con tu suscripción, puedes descargarlo con créditos. Esta es una
                    forma estupenda de complementar una suscripción básica con
                    contenido premium de la colección Signature o clips de vídeo.
                    También puedes contactarnos en cualquier momento para actualizar
                    tu plan. Estaremos encantados de ayudarte.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapseOne">
                    ¿Caducan mis descargas de imágenes y vídeos con licencia?
                </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Tus derechos de uso sobre los archivos descargados durante el
                    periodo de tu suscripción no tienen fecha de vencimiento.
                </div>
                <div class="accordion-body">
                    Los archivos licenciados con créditos también pueden ser
                    utilizados en tantos proyectos como quieras y por el tiempo que
                    quieras. Los créditos no caducan, siempre que inicies sesión en tu
                    cuenta al menos una vez al año.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color: transparent" ;>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: #dad4c8" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapseOne">
                    ¿Puedo compartir mi suscripción con mis compañeros de equipo?
                </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Nuestras suscripciones estándar están hechas para usuarios
                    individuales, lo que significa que la misma persona tiene que
                    iniciar sesión, descargar y utilizar los archivos bajo licencia
                    con su suscripción. Si estás interesado en añadir más de un
                    usuario a tu suscripción, contáctanos. Podemos ayudarte a
                    personalizar un plan que se adapte a tus necesidades.
                </div>
            </div>
        </div>
    </div>
</section>