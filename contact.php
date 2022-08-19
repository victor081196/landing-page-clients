<?php
include_once 'config.php';

$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents(URL_API . "sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];
$res = json_decode(file_get_contents(URL_API . "sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);

$psnw_top_bar = json_decode($res['psnw_top_bar'], true);
$psnw_redes_sociales = json_decode($res['psnw_redes_sociales'], true);

$pgn = json_decode(file_get_contents(URL_API . "sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_contacto = json_decode($pgn['pgn_contacto'], true);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>
	<?php include_once 'components/top-bar.php'; ?>

	<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= $pgn_contacto['banner'] ?>');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<h1 class="mb-3 bread">Contacto</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>Contacto <i class="fa fa-chevron-right"></i></span></p>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper px-md-4">
						<div class="row mb-5">
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="text">
										<p><span>Dirección:</span> <?= $pgn_contacto['direccion'] ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-phone"></span>
									</div>
									<div class="text">
										<p><span>Telefono:</span> <a href="tel:<?= $pgn_contacto['telefono'] ?>"><?= $pgn_contacto['telefono'] ?></a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-paper-plane"></span>
									</div>
									<div class="text">
										<p><span>Correo:</span> <a href="mailto:<?= $pgn_contacto['correo'] ?>"><?= $pgn_contacto['correo'] ?></a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row no-gutters">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Contactanos</h3>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">NOMBRE COMPLETO</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">DIRECCIÓN DE CORREO ELECTRÓNICO</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">ASUNTO</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">MENSAJE</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mensaje"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Enviar Mensaje" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 order-md-first d-flex align-items-stretch">
								<?= $pgn_contacto['mapa'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include_once 'components/footer.php'; ?>
	<?php include_once 'components/scripts.php'; ?>

</body>

</html>