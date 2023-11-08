<div class="container">
  <div class="row">
    <div class="col">
      <h1>Turnos Pedidos:</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <?php
      $parser = \Config\Services::parser();
      echo $parser->setData(['turn' => $User])->render('templ/turn_user');
      ?>
    </div>
  </div>
</div>
