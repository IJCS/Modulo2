<div class="container">
  <div class="row">
    <div class="col">
      <h1>Turnos Pendientes:</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <?php
      $parser = \Config\Services::parser();
      echo $parser->setData(['turn' => $Turnos[0],'Día'=>'2023-11-20'])->render('templ/turn_list');
      echo $parser->setData(['turn' => $Turnos[1],'Día'=>'2023-11-21'])->render('templ/turn_list');
      echo $parser->setData(['turn' => $Turnos[2],'Día'=>'2023-11-22'])->render('templ/turn_list');
      echo $parser->setData(['turn' => $Turnos[3],'Día'=>'2023-11-23'])->render('templ/turn_list');
      echo $parser->setData(['turn' => $Turnos[4],'Día'=>'2023-11-24'])->render('templ/turn_list');
      echo $parser->setData(['turn' => $Turnos[5],'Día'=>'2023-11-25'])->render('templ/turn_list');
      ?>
    </div>
  </div>
</div>
