<?php
include_once 'config.php';

$scl = json_decode(file_get_contents(URL_API . "sitioweb/sucursales/scl_id/" . base64_decode($_GET['scl_id'])), true);

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>
  <?php include_once 'components/top-bar.php'; ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= $scl['scl_imagen'] ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread"><?= $scl['scl_nombre'] ?></h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span><?= $scl['scl_nombre'] ?> <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3"><?= $scl['scl_nombre'] ?></h2>
          <p><i class="fa fa-globe"></i><strong>Direccion:</strong> <?= $scl['scl_direccion'] ?></p>
          <p><i class="fa fa-phone"></i><strong>Telefono:</strong> <?= $scl['scl_telefono'] ?></p>
          <p>
            <img src="<?= $scl['scl_imagen'] ?>" alt="" class="img-fluid">
          </p>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">

          </div>
          <div class="sidebar-box ftco-animate">
            <div class="categories">
              <?php
              $horario = json_decode($scl['scl_horario']);
              $Lunes = !empty($horario->Lunes) ? $horario->Lunes[0] . " - " . $horario->Lunes[1] : "-";
              $Martes = !empty($horario->Martes) ? $horario->Martes[0] . " - " . $horario->Martes[1] : "-";
              $Miercoles = !empty($horario->Miercoles) ? $horario->Miercoles[0] . " - " . $horario->Miercoles[1] : "-";
              $Jueves = !empty($horario->Jueves) ? $horario->Jueves[0] . " - " . $horario->Jueves[1] : "-";
              $Viernes = !empty($horario->Viernes) ? $horario->Viernes[0] . " - " . $horario->Viernes[1] : "-";
              $Sabado = !empty($horario->Sabado) ? $horario->Sabado[0] . " - " . $horario->Sabado[1] : "-";
              $Domingo = !empty($horario->Domingo) ? $horario->Domingo[0] . " - " . $horario->Domingo[1] : "-";
              ?>
              <h3>Horario</h3>
              <li><a href="#">Lunes <span><?= $Lunes ?></span></a></li>
              <li><a href="#">Martes <span><?= $Martes ?></span></a></li>
              <li><a href="#">Miercoles <span><?= $Miercoles ?></span></a></li>
              <li><a href="#">Jueves <span><?= $Jueves ?></span></a></li>
              <li><a href="#">Viernes <span><?= $Viernes ?></span></a></li>
              <li><a href="#">Sabado <span><?= $Sabado ?></span></a></li>
              <li><a href="#">Domingo <span><?= $Domingo ?></span></a></li>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- .section -->

  <?php include_once 'components/footer.php'; ?>
  <?php include_once 'components/scripts.php'; ?>

</body>

</html>