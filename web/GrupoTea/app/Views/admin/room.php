<?php $data = json_decode(file_get_contents("http://localhost:3000/usuarios"));

$parser = \Config\Services::parser(); ?>
<ul class="nav nav-tabs justify-content-around" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Administrar Usuarios</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Administrar Profesionales</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <div class="container">
      <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Mail</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
            <?=
              $parser->setData(['users' => $data,'URL_UPDATE'=>base_url('usuario')])->render('templ/user_list');
             ?>
            </tbody>
          </table>
          <form class="d-flex" action="<?= base_url('usuarios') ?>" method="post">
            <input class="form-control" type="text" name="NN" placeholder="Nombre">
            <input class="form-control" type="text" name="NA" value="" placeholder="Apellido">
            <input class="form-control" type="email" name="CEr" value="" placeholder="Mail">
            <input class="form-control" type="password" name="Passr" value="" placeholder="Contraseña">
            <input class="btn btn-primary" type="submit" value="Registrar">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                </tr>
              </thead>
              <tbody>
              <?=
                $parser->setData(['profs' => $Profs])->render('templ/prof_list');
               ?>
              </tbody>
            </table>
            <form class="d-flex" action="<?= base_url('profesi') ?>" method="post">
              <select class="form-select" id="inputGroupSelect01" name="UID">
                <option selected hidden>Nombre</option>
                <?= $parser->setData(['Users' => $Users])->render('templ/user_option'); ?>
              </select>
              <input class="form-control" type="text" name="Desc" value="" placeholder="Descripción">
              <input class="btn btn-primary" type="submit" value="Registrar">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
