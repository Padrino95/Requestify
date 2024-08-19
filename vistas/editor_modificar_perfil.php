<?php
echo"
<section class='container mt-5'>
<h1 class='text-center'>Confirme su contraseña o introduzca una nueva</h1>
    <form action='../controladores/editor_editar_perfil.php' method='POST' enctype='multipart/form-data'>
    <div class='mb-3'>
            <label for='id' class='form-label' >id:</label>
            <input type='text' class='form-control' id='id' name='id' value='$_GET[id]' readonly required>
        </div>
    <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' value='$_GET[nombre]' required>
        </div>
        <div class='mb-3'>
            <label for='nick' class='form-label'>Nick:</label>
            <input type='text' class='form-control' id='nick' name='nick' value='$_GET[nick]' required>
        </div>
        <div class='mb-3'>
            <label for='rol' class='form-label'>Rol:</label>
            <select id='rol' name='tipo' class='form-select form-select-sm' required>
                <option value='A'>Administrador</option>
                <option value='E' selected>Editor</option>
            </select>
        </div>
        <div class='mb-3'>
            <label for='contrasena' class='form-label'>Contraseña:</label>
            <input type='password' class='form-control' id='contrasena' name='contrasena' required>
        </div>
        <div class='mb-3'>
            <label for='estiloE' class='form-label'>Estilo:</label>;
            <select class='form-select' id='estilo' name='estiloE' required>
                    <option value=''>Todos los estilos</option>";
                    foreach ($estilos as $value) {
                        echo "<option value='" . $value['cod'] . "'>" . $value['nombre'] . "</option>";
                    }
                    echo"
                </select>
        </div>
        <div class='mb-3'>
            <label for='imagen' class='form-label'>Foto:</label>
            <input type='file' class='form-control' id='imagen' name='imagen'>
        </div>
        <div class='mb-3'>
            <label for='presentacion' class='form-label'>Presentación:</label>
            <textarea id='presentacion' name='presentacion' class='form-control' rows='6' cols='50' required>$_GET[presentacion]</textarea>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>