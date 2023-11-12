
<div class="container">
  <div class="row">
    <div class="col">
      <?php if (session()->has('errors')) : ?>
        <ul class="alert alert-danger">
          <?php foreach (session('errors') as $error) : ?>
            <li class="mx-2"><?= $error ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
      <?php if (session()->has('message')) : ?>
        <?= "<h2 class='text-center bg-danger bg-gradient bg-opacity-50 p-1 border border-warning rounded'>".session('message')."</h2>"; ?>
      <?php endif; ?>
      <h1>Nuestros Profesionales:</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="owl-carousel owl-theme">
        <?php
        $parser = \Config\Services::parser();
        echo $parser->setData(['Profs' => $Profs])->render('templ/prof_carr');
        ?>
      </div>
    </div>
  </div>
</div>

<?= $parser->setData(['Profs' => $Profs,'User'=> session()->get('ID'),'URL'=> base_url('turno')])->render('templ/prof_turn'); ?>

<script type="text/javascript">
$('.owl-carousel').owlCarousel({
  loop:false,
  margin:10,
  nav:true,
  dotsEach:true,
  responsive:{
    0:{
      items:1
    },
    700:{
      items:2
    },
    1400:{
      items:3
    },
    2000:{
      items:4
    }
  },
})
if ('<?= session()->get('Tipo') ?>'=='User') {
  $('.turno-boton').removeClass( "d-none" )
}
</script>
