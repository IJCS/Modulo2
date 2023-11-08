<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?= $Título ?></title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="rec/owl.carousel.min.css">
  <link rel="stylesheet" href="rec/owl.theme.default.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="rec/owl.carousel.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-9">
          <img class="img-fluid img-thumbail "src="img/Logo.svg" alt="Grupo Tea: Atención Oftalmológica">
        </div>
        <div class="col d-flex justify-content-center align-items-center">
          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <?php if (session()->get('Tipo')=='Admin'): ?>
              <a href="<?= base_url('perfil') ?>" class="btn btn-secondary">Administrar</a>
              <a href="<?= base_url('logout') ?>" class="btn btn-outline-secondary">Cerrar sesión</a>
            <?php elseif (session()->get('Tipo')=='Medic'): ?>
              <a href="<?= base_url('perfil') ?>" class="btn btn-secondary">Turnos</a>
              <a href="<?= base_url('logout') ?>" class="btn btn-outline-secondary">Cerrar sesión</a>
            <?php elseif (session()->get('Tipo')=='User'): ?>
              <a href="<?= base_url('perfil') ?>" class="btn btn-secondary">Perfil</a>
              <a href="<?= base_url('logout') ?>" class="btn btn-outline-secondary">Cerrar sesión</a>
            <?php else: ?>
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#Login">Ingresar</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#Regis">Registrarse</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="col">
            <form action="<?= base_url('login') ?>" method="post">
              <div class="mb-3">
                <input type="email" placeholder="Correo Electronico" class="form-control" id="CE" name="CE">
              </div>
              <div class="mb-3">
                <input type="password" placeholder="Contraseña" class="form-control" id="Pass" name="Pass">
              </div>
              <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-light btn-block w-25">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="Regis" tabindex="-1" aria-labelledby="Regis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="Regis">Registro de Usuario</h1>
        </div>
        <form action="<?= base_url('usuarios') ?>" method="post">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col">
                  <input type="text" placeholder="Nombre" class="form-control" id="NN" name="NN">
                </div>
                <div class="col">
                  <input type="text" placeholder="Apellido" class="form-control" id="NA" name="NA">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="email" placeholder="Correo Electronico" class="form-control mt-3" id="CEr" name="CEr">
                  <input type="password" placeholder="Contraseña" class="form-control mt-3" id="Passr" name="Passr">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" value="Submit" class="btn btn-dark">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg bg-body-tertiary my-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navegación</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url() ?>">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url('somos') ?>">¿Quiénes somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url('acerca') ?>">Acerca de</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
