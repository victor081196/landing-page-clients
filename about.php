<?php
include_once 'config.php';


$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];

$pgn = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_sobre = json_decode($pgn['pgn_sobre'], true);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>

  <?php include_once 'components/top-bar.php'; ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= $pgn_sobre['banner'] ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Sobre nosotros</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>Sobre nosotros <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>



  <section class="ftco-section" id="section-counter">
    <div class="container-fluid">
      <div class="row no-gutters d-flex">
        <!-- <div class="col-md-6 d-flex">
          <div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
        </div> -->
        <div class="col-md-12 p-3 pl-md-5 py-5 bg-primary">
          <div class="row justify-content-start pb-3">
            <div class="col-md-12 heading-section heading-section-white ftco-animate">
              <h2 class="mb-4">Acerca de <span>nosotros</span></h2>
              <p><?= $pgn_sobre['contenido'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light ftco-faqs">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 order-md-last">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="heading-section mb-5 mt-5 mt-lg-0">
            <h2 class="mb-3">Preguntas y respuestas</h2>
          </div>
          <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <?php
            $i = 0;
            $preguntas = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/preguntas/suscriptor/" . $id_suscriptor), true);
            foreach ($preguntas as $pgta) :
              if ($i == 0) {
                $show = 'show';
              } else {
                $show = '';
              }
            ?>
              <div class="card">
                <div class="card-header p-0" id="heading<?= $pgta['pgta_id'] ?>">
                  <h2 class="mb-0">
                    <button href="#collapse<?= $pgta['pgta_id'] ?>" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapse<?= $pgta['pgta_id'] ?>">
                      <p class="mb-0"><?= $pgta['pgta_pregunta'] ?></p>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </h2>
                </div>
                <div class="collapse <?= $show ?>" id="collapse<?= $pgta['pgta_id'] ?>" role="tabpanel" aria-labelledby="heading<?= $pgta['pgta_id'] ?>">
                  <div class="card-body py-3 px-0 pl-4">
                    <?= $pgta['pgta_respuesta'] ?>
                  </div>
                </div>
              </div>
            <?php
              $i++;
            endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include_once 'components/footer.php'; ?>
  <?php include_once 'components/scripts.php'; ?>

</body>

</html>