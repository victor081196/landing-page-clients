<?php ob_start();
include_once 'config.php';


$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];
$res = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);

$psnw_top_bar = json_decode($res['psnw_top_bar'], true);
$psnw_redes_sociales = json_decode($res['psnw_redes_sociales'], true);

$pgn = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_contacto = json_decode($pgn['pgn_contacto'], true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Inicio</title>
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
					<li class="nav-item active"><a href="<?= HTTP_HOST ?>" class="nav-link">Inicio</a></li>
					<li class="nav-item"><a href="about" class="nav-link">Sobre</a></li>
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

	<div id="carouselExampleIndicators" class="carousel slide hero-wrap js-fullheight" data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$i = 0;
			$sliders = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/sliders/suscriptor/" . $id_suscriptor), true);
			foreach ($sliders as $slider) : ?>
				<?php if ($i == 0) {
					$active = 'active';
				} else {
					$active = '';
				} ?>
				<div class="carousel-item <?= $active; ?>">
					<div class="hero-wrap js-fullheight" style="background-image: url('<?= $slider['sld_imagen'] ?>');" data-stellar-background-ratio="0.5">
						<div class="overlay"></div>
						<div class="container">
							<div class="row no-gutters slider-text js-fullheight align-items-center text-center" data-scrollax-parent="true">
								<div class="col-12 ftco-animate mt-5 pt-md-5" data-scrollax=" properties: { translateY: '70%' }">
									<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $slider['sld_titulo'] ?></h1>
									<p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $slider['sld_descripcion'] ?></p>
									<p>
										<?php if (!empty($slider['sld_texto_boton'])) : ?>
											<a href="<?= $slider['sld_url_boton'] ?>" class="btn btn-primary px-4 py-3"><?= $slider['sld_texto_boton'] ?></a>
										<?php endif; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $i++;
			endforeach; ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- <section class="ftco-intro">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-7">
					<div class="row no-gutters d-flex align-items-stretch">
						<div class="col-md-4 d-flex align-self-stretch ftco-animate">
							<div class="services-1">
								<div class="line"></div>
								<div class="icon"><span class="flaticon-bolt"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Information Technology Consultancy</h3>
								</div>
							</div>
						</div>
						<div class="col-md-4 d-flex align-self-stretch ftco-animate">
							<div class="services-1 color-1">
								<div class="line"></div>
								<div class="icon"><span class="flaticon-light-bulb"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Product Design Strategy</h3>
								</div>
							</div>
						</div>
						<div class="col-md-4 d-flex align-self-stretch ftco-animate">
							<div class="services-1 color-2">
								<div class="line"></div>
								<div class="icon"><span class="flaticon-cyber"></span></div>
								<div class="media-body">
									<h3 class="heading mb-3">Cyber Security &amp; Web Development</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 heading-section text-center ftco-animate">
					<h2 class="mb-3"><span>+</span>Caracteristicas</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row justify-content-center align-items-center text-center">
				<?php
				$caracteristicas = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/caracteristicas/suscriptor/" . $id_suscriptor), true);
				foreach ($caracteristicas as $cts) : ?>
					<div class="col-md-4">
						<div class="services-2">
							<div class="icon">
								<img class="mb-4" src="<?= $cts['cts_icono'] ?>" alt="icono">
							</div>
							<div class="text">
								<h3><?= $cts['cts_titulo'] ?></h3>
								<p><?= $cts['cts_descripcion'] ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ftco-counter img" id="section-counter">
		<div class="container">
			<div class="row no-gutters d-flex">
				<div class="col-md-6 d-flex">
					<div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
				</div>
				<div class="col-md-6 p-3 pl-md-5 py-5 bg-primary">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section heading-section-white ftco-animate">
							<h2 class="mb-4">Consult us here in <span>ITSolution</span></h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 justify-content-center counter-wrap ftco-animate">
							<div class="block-18 mb-4">
								<div class="text">
									<strong class="number" data-number="750">0</strong>
									<span>Project Complete</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 justify-content-center counter-wrap ftco-animate">
							<div class="block-18 mb-4">
								<div class="text">
									<strong class="number" data-number="568">0</strong>
									<span>Happy Clients</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 justify-content-center counter-wrap ftco-animate">
							<div class="block-18 mb-4">
								<div class="text">
									<strong class="number" data-number="478">0</strong>
									<span>Business Partners</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 justify-content-center counter-wrap ftco-animate">
							<div class="block-18 mb-4">
								<div class="text">
									<strong class="number" data-number="780">0</strong>
									<span>IT Consultant</span>
								</div>
							</div>
						</div>
					</div>
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
			<div class="row d-flex no-gutters justify-content-center align-items-center">
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


	<section class="ftco-section ftco-no-pb testimony-section" style="background-image: url(images/bg_1.jpg);">
		<div class="overlay-1"></div>
		<div class="container-fluid">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2 class="mb-4">Our insights &amp; creative ideas</h2>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12 testimonial">
					<div class="carousel-testimony owl-carousel ftco-owl">
						<div class="item">
							<div class="testimony-wrap d-flex align-items-stretch" style="background-image: url(images/testimony-1.jpg);">
								<div class="overlay"></div>
								<div class="text">
									<div class="line"></div>
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Donna Scott</p>
									<span class="position">Marketing Manager</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap d-flex align-items-stretch" style="background-image: url(images/testimony-2.jpg);">
								<div class="overlay"></div>
								<div class="text">
									<div class="line"></div>
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Roger Scott</p>
									<span class="position">Interface Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap d-flex align-items-stretch" style="background-image: url(images/testimony-3.jpg);">
								<div class="overlay"></div>
								<div class="text">
									<div class="line"></div>
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Roger Scott</p>
									<span class="position">UI Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap d-flex align-items-stretch" style="background-image: url(images/testimony-4.jpg);">
								<div class="overlay"></div>
								<div class="text">
									<div class="line"></div>
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Roger Scott</p>
									<span class="position">Web Developer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap d-flex align-items-stretch" style="background-image: url(images/testimony-5.jpg);">
								<div class="overlay"></div>
								<div class="text">
									<div class="line"></div>
									<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Roger Scott</p>
									<span class="position">System Analyst</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>¡Nuestras sucursales!</h2>
				</div>
			</div>
			<div class="row d-flex">
				<?php
				$sucursales = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/sucursales/suscriptor/" . $id_suscriptor), true);
				foreach ($sucursales as $scl) :
				?>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="sucursal?scl_id=<?= base64_encode($scl['scl_id']) ?>" class="block-20" style="background-image: url('<?= $scl['scl_imagen'] ?>');">
							</a>
							<div class="text mt-3 float-right d-block">
								<!-- <div class="d-flex align-items-center pt-2 mb-4 topp">
									<div class="one">
										<span class="day"><i class="fa fa-clock-o"></i></span>
									</div>
									<div class="two pl-1">
										<span class="yr">Horario</span>
										<span class="mos"><?= date('Y') ?></span>
									</div>
								</div> -->
								<h3 class="heading"><a href="sucursal?scl_id=<?= base64_encode($scl['scl_id']) ?>"><?= $scl['scl_nombre'] ?> </a></h3>
								<p><?= $scl['scl_direccion'] ?></p>
								<p class="text-primary">Tel. <a href="tel:<?= $scl['scl_telefono'] ?>"><?= $scl['scl_telefono'] ?></a></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ftco-appointment ftco-section img" style="background-image: url('<?= $pgn_contacto['banner'] ?>');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 half ftco-animate">
					<h2 class="mb-4">Don't hesitate to contact us</h2>
					<form action="#" class="appointment">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">Services</option>
												<option value="">Web Development</option>
												<option value="">Database Analysis</option>
												<option value="">Server Security</option>
												<option value="">UX/UI Strategy</option>
												<option value="">Branding</option>
												<option value="">Applications</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send message" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

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