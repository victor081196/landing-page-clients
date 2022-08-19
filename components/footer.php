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
<footer class="ftco-footer ftco-footer-2 ftco-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-footer-logo"><img src="<?= $res['psnw_logo'] ?>" width="100px" alt="logo"></h2>
					<p><?= $res['psnw_descripcion'] ?></p>
					<ul class="ftco-footer-social list-unstyled mt-2">
						<li class="ftco-animate"><a href="<?= $psnw_redes_sociales['twitter'] ?>" target="_blank"><span class="fa fa-twitter"></span></a></li>
						<li class="ftco-animate"><a href="<?= $psnw_redes_sociales['facebook'] ?>" target="_blank"><span class="fa fa-facebook"></span></a></li>
						<li class="ftco-animate"><a href="<?= $psnw_redes_sociales['instagram'] ?>" target="_blank"><span class="fa fa-instagram"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Explorar</h2>
					<ul class="list-unstyled">
						<li><a href="about" class="py-2 d-block">Sobre</a></li>
						<li><a href="contact" class="py-2 d-block">Contacto</a></li>
						<!-- <li><a href="#" class="py-2 d-block">Qué Hacemos</a></li> -->
						<!-- <li><a href="#" class="py-2 d-block">Planes y precios</a></li> -->
						<!-- <li><a href="#" class="py-2 d-block">Política de reembolso</a></li> -->
						<li><a href="contact" class="py-2 d-block">Llámanos</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Legal</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">Únete a nosotros</a></li>
						<!-- <li><a href="#" class="py-2 d-block">Blog</a></li> -->
						<li><a href="privacy" class="py-2 d-block">Privacidad y Política</a></li>
						<li><a href="terms" class="py-2 d-block">Términos y Condiciones</a></li>
						<!-- <li><a href="#" class="py-2 d-block">Careers</a></li> -->
						<li><a href="contact" class="py-2 d-block">Contacto</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">¿Tiene alguna pregunta?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon fa fa-map marker"></span><span class="text"><?= $pgn_contacto['direccion'] ?></span></li>
							<li><a href="tel:<?= $pgn_contacto['telefono'] ?>"><span class="icon fa fa-phone"></span><span class="text"><?= $pgn_contacto['telefono'] ?></span></a></li>
							<li><a href="mailto:<?= $pgn_contacto['correo'] ?>"><span class="icon fa fa-paper-plane pr-4"></span><span class="text"><?= $pgn_contacto['correo'] ?></span></a></li>
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
					</script> Todos los derechos reservados | Esta plantilla está hecha con <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.softmor.com/" target="_blank">Softmor</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</div>
</footer>