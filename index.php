<?php ob_start();
include_once 'config.php';

$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents(URL_API . "sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];

$res = json_decode(file_get_contents(URL_API . "sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);
$psnw_top_bar = json_decode($res['psnw_top_bar'], true);

$pgn = json_decode(file_get_contents(URL_API . "sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_contacto = json_decode($pgn['pgn_contacto'], true);
$pgn_sobre = json_decode($pgn['pgn_sobre'], true);
$pgn_cts = json_decode($pgn['pgn_caracteristicas'], true);
$pgn_preguntas = json_decode($pgn['pgn_preguntas'], true);

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>

	<?php include_once 'components/top-bar.php'; ?>

	<div id="carouselExampleIndicators" class="carousel slide hero-wrap js-fullheight" data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$i = 0;
			$sliders = json_decode(file_get_contents(URL_API . "sitioweb/sliders/suscriptor/" . $id_suscriptor), true);
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
											<a href="<?= $slider['sld_url_boton'] ?>" class="btn btn-primary px-4 py-3" target="_blank"><?= $slider['sld_texto_boton'] ?></a>
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
					<h2 class="mb-3"><span>¡Nuestras </span>caracteristicas!</h2>
					<p><?= $pgn_cts['descripcion'] ?></p>
				</div>
			</div>
			<div class="row justify-content-center align-items-center text-center">
				<?php
				$caracteristicas = json_decode(file_get_contents(URL_API . "sitioweb/caracteristicas/suscriptor/" . $id_suscriptor), true);
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
					<div class="img d-flex align-self-stretch" style="background-image:url('<?= $pgn_sobre['presentacion'] ?>');background-size: cover;background-repeat: no-repeat;"></div>
				</div>
				<div class="col-md-6 p-3 pl-md-5 py-5 bg-primary">
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

	<section class="ftco-section services-section">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-md-6 heading-section text-center ftco-animate">
					<h2 class="mb-4">¡Nuestros <span>servicios!</span></h2>
					<p><?= $pgn_cts['descripcion'] ?></p>
				</div>
			</div>
			<div class="row d-flex no-gutters justify-content-center align-items-center">
				<?php
				$servicios = json_decode(file_get_contents(URL_API . "sitioweb/servicios/suscriptor/" . $id_suscriptor), true);
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
					<h2 class="mb-4">¡Nuestro <span>trabajo!</span></h2>
				</div>
			</div>
			<div class="row">
				<?php
				$galeria = json_decode(file_get_contents(URL_API . "sitioweb/galeria/suscriptor/" . $id_suscriptor), true);
				foreach ($galeria as $gra) : ?>
					<div class="col-xl-4 col-md-6 col-12 d-flex justify-content-center ftco-animate">
						<div class="project">
							<div class="img">
								<img src="<?= $gra['gra_foto'] ?>" class="img-fluid" alt="Colorlib Template" style="width: 350px;height: 350px;object-fit: cover;">
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
					<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url('<?= $pgn_preguntas['presentacion'] ?>');">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="heading-section mb-5 mt-5 mt-lg-0">
						<h2 class="mb-3">Preguntas y respuestas</h2>
					</div>
					<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
						<?php
						$i = 0;
						$preguntas = json_decode(file_get_contents(URL_API . "sitioweb/preguntas/suscriptor/" . $id_suscriptor), true);
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


	<section class="ftco-section ftco-no-pb testimony-section bg-primary">
		<div class="overlay-1"></div>
		<div class="container-fluid">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
					<h2 class="mb-4">¿Tienes dudas?</h2>
					<p>Contáctanos vía whatsapp para resolver todas la dudas que puedas tener.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center mb-5">
					<a href="https://api.whatsapp.com/send/?phone=<?= $psnw_top_bar['psnw_whatsapp'] ?>" class="btn btn-outline-light btn-lg rounded-pill" target="_blank"><i class="fa fa-whatsapp"></i> WHATSAPP</a>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>¡Nuestras <span>sucursales!</span></h2>
				</div>
			</div>
			<div class="row d-flex">
				<?php
				$sucursales = json_decode(file_get_contents(URL_API . "sitioweb/sucursales/suscriptor/" . $id_suscriptor), true);
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
					<h2 class="mb-4">No dude en contactarnos</h2>
					<form action="#" class="appointment">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Su nombre">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Corrreo electronico">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">Servicios</option>
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
									<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Mensaje"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Enviar mensaje" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<?php include_once 'components/footer.php'; ?>
	<?php include_once 'components/scripts.php'; ?>

</body>

</html>