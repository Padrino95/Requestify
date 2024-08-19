<?php
function obtenerHoraActual()
{
  return date('H:i:s');
}
function checkLoggin()
{
  if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
  }
  if (isset($_COOKIE["sesion"])) {
    session_decode($_COOKIE["sesion"]);
    $id = $_SESSION["id"];
  } elseif (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
  } else {
    $id = -1;
  }
  return $id;
}
function checkAdmin($id)
{
  if ($id > 0) {
    header("refresh:0;url=../index.php");
  } elseif ($id == -1) {
    header("refresh:0;url=../vistas/acceso.php");
  }
}
function checkUser($id)
{
  if ($id == -1) {
    header("refresh:0;url=../vistas/acceso.php");
  } elseif ($id == 0) {
    header("refresh:0;url=../index.php");
  }
}
function pintaMenuIndex($id)
{
  if ($id == 0) {
    echo "<header>
        <nav class='navbar navbar-expand-lg  fixed-top'>
            <div class='container-fluid'>
              <a class='navbar-brandM' href='#'>
                <img src='./assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
              </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/admin_listar_clientes.php'>Clientes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/admin_listar_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/admin_listar_estilos.php'>Estilos</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  } elseif ($id > 0 && $_SESSION['tipoU'] == "C") {
    echo "
        <header>
        <nav class='navbar navbar-expand-lg fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='#'>
            <img src='./assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/cliente_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/usuario_listar_planes.php'>Planes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/cliente_listar_contratos.php'>Mi perfil</a>
                  </li>
                    <a class='nav-link' href='./controladores/cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  } elseif ($id > 0 && $_SESSION['tipoU'] == "E") {
    echo "
      <header>
      <nav class='navbar navbar-expand-lg fixed-top'>
          <div class='container-fluid'>
          <a class='navbar-brandM' href='#'>
          <img src='./assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
        </a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
              <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='#'>Home</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='./controladores/cliente_editores.php'>Editores</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='./controladores/editor_listar_proyectos.php'>Mi perfil</a>
                </li>
                  <a class='nav-link' href='./controladores/cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                </li>
              </ul>
              <form class='d-flex buscador' role='search'>
                <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                <button class='btn btn btn-dark' type='submit'>Search</button>
              </form>
            </div>
          </div>
        </nav>
  </header>";
  } else {
    echo "
        <header>
        <nav class='navbar navbar-expand-lg  fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='#'>
            <img src='./assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='#'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/cliente_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./controladores/usuario_listar_planes.php'>Planes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./vistas/acceso.php'>Acceder</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  }
}


function pintaMenu($id)
{
  if ($id == 0) {
    echo "<header>
        <nav class='navbar navbar-expand-lg fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='../index.php'>
            <img src='../assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_clientes.php'>Clientes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./admin_listar_estilos.php'>Estilos</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  } elseif ($id > 0 && $_SESSION['tipoU'] == "C") {
    echo "
        <header>
        <nav class='navbar navbar-expand-lg fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='../index.php'>
            <img src='../assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cliente_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./usuario_listar_planes.php'>Planes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cliente_listar_contratos.php'>Mi perfil</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  } elseif ($id > 0 && $_SESSION['tipoU'] == "E") {
    echo "
        <header>
        <nav class='navbar navbar-expand-lg fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='../index.php'>
            <img src='../assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cliente_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./editor_listar_proyectos.php'>Mi perfil</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./cerrar_sesion.php?cerrar'>Cerrar sesión de $_SESSION[nick]</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  } else {
    echo "
        <header>
        <nav class='navbar navbar-expand-lg fixed-top'>
            <div class='container-fluid'>
            <a class='navbar-brandM' href='../index.php'>
            <img src='../assets/imagenes/acceso/logo.png' alt='logo' class='img-fluid logo'>
          </a>
              <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                  <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='../index.php'>Home</a>
                  </li>
                    <a class='nav-link' href='./cliente_editores.php'>Editores</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='./usuario_listar_planes.php'>Planes</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='../vistas/acceso.php'>Acceder</a>
                  </li>
                </ul>
                <form class='d-flex buscador' role='search'>
                  <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
                  <button class='btn btn btn-dark' type='submit'>Search</button>
                </form>
              </div>
            </div>
          </nav>
    </header>";
  }
}

function pintarFooter()
{
  echo "
    <footer class='container h-25'>
  <div class='py-3 my-4'>
    <ul class='nav justify-content-center border-bottom pb-3 mb-3'>
      <li class='nav-item'><a href='#' class='nav-link px-2 blanco'>Home</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 blanco'>Features</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 blanco'>Pricing</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 blanco'>FAQs</a></li>
      <li class='nav-item'><a href='#' class='nav-link px-2 blanco'>About</a></li>
    </ul>
    <p class='text-center blanco'>© 2022 Company, Inc</p>
  </div></footer>";
}
