<?php
include_once 'config.php';

$scl = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/sucursales/scl_id/" . base64_decode($_GET['scl_id'])), true);

$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];
$res = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);

$psnw_top_bar = json_decode($res['psnw_top_bar'], true);
$psnw_redes_sociales = json_decode($res['psnw_redes_sociales'], true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sucursal - <?= $scl['scl_nombre'] ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="<?= $res['psnw_favicon'] ?>">
</head>

<body>
  <div class="wrap">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-12 col-md d-flex align-items-center">
          <p class="mb-0 phone">
            <span class="mailus"><i class="fa fa-phone"></i></span> <a href="tel:<?= $psnw_top_bar['psnw_telefono'] ?>"><?= $psnw_top_bar['psnw_telefono'] ?></a>
            <span class="mailus"><i class="fa fa-envelope"></i> </span> <a href="mailto:<?= $psnw_top_bar['psnw_correo'] ?>"><?= $psnw_top_bar['psnw_correo'] ?></a>
            <span class="mailus"><i class="fa fa-clock-o"></i></span> <a href="#"><?= $psnw_top_bar['psnw_horario'] ?></a>
          </p>
        </div>
        <div class="col-12 col-md d-flex justify-content-md-end">
          <div class="social-media">
            <p class="mb-0 d-flex">
              <a href="<?= $psnw_redes_sociales['facebook'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
              <a href="<?= $psnw_redes_sociales['twitter'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
              <a href="<?= $psnw_redes_sociales['instagram'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= HTTP_HOST ?>"><img src="<?= $res['psnw_logo'] ?>" width="150px" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="<?= HTTP_HOST ?>" class="nav-link">Inicio</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">Sobre</a></li>
          <li class="nav-item"><a href="services" class="nav-link">Servicios</a></li>
          <li class="nav-item"><a href="cases.html" class="nav-link">Case Study</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact" class="nav-link">Contacto</a></li>
          <li class="nav-item cta"><a href="#" class="nav-link">Free Consultation</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

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

  <footer class="ftco-footer ftco-footer-2 ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-footer-logo">IT<span>solution</span></h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled mt-2">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Explore</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
              <li><a href="#" class="py-2 d-block">What We Do</a></li>
              <li><a href="#" class="py-2 d-block">Plans &amp; Pricing</a></li>
              <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
              <li><a href="#" class="py-2 d-block">Call Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Legal</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Join Us</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Privacy &amp; Policy</a></li>
              <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Careers</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>