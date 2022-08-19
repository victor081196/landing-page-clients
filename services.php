<?php
include_once 'config.php';

$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];

$pgn = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_srv = json_decode($pgn['pgn_servicios'], true);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>

  <?php include_once 'components/top-bar.php'; ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= $pgn_srv['banner'] ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Servicios</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>Servicios <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section services-section">
    <div class="container">
      <div class="row justify-content-center pb-5">
        <div class="col-md-6 heading-section text-center ftco-animate">
          <h2 class="mb-4">Nuestros <span>Servicios</span></h2>
        </div>
      </div>
      <div class="row d-flex no-gutters">
        <?php
        $servicios = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/servicios/suscriptor/" . $id_suscriptor), true);
        foreach ($servicios as $srv) : ?>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate text-center m-3">
            <div class="media block-6 services d-block">
              <div class="line"></div>
              <div class="icon"><img src="<?= $srv['srv_icono'] ?>" width="50px" style="object-fit:cover;" alt="icono"></div>
              <div class="media-body">
                <h3 class="heading mb-3"><?= $srv['srv_titulo'] ?></h3>
                <p><?= $srv['srv_descripcion'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt">
    <div class="container">
      <div class="row justify-content-center pb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Nuestro <span>Trabajo</span></h2>
        </div>
      </div>
      <div class="row">
        <?php
        $galeria = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/galeria/suscriptor/" . $id_suscriptor), true);
        foreach ($galeria as $gra) : ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="project">
              <div class="img">
                <img src="<?= $gra['gra_foto'] ?>" class="img-fluid" alt="Colorlib Template" style="object-fit: cover;">
              </div>
              <a href="<?= $gra['gra_foto'] ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                <span class="fa fa-expand"></span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section class="ftco-section bg-light ftco-faqs">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-md-last">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
          </div>
          <!-- <div class="d-flex mt-3">
						<div class="img img-2 mr-md-2 w-100" style="background-image:url(images/about-1.jpg);"></div>
						<div class="img img-2 ml-md-2 w-100" style="background-image:url(images/about-2.jpg);"></div>
					</div> -->
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