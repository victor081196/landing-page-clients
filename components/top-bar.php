<?php
include_once 'config.php';


$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];
$res = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);

$psnw_top_bar = json_decode($res['psnw_top_bar'], true);
$psnw_redes_sociales = json_decode($res['psnw_redes_sociales'], true);

?>
<div class="wrap">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md d-flex align-items-center">
                <p class="mb-0 phone">
                    <span class="mailus"><i class="fa fa-phone"></i></span> <a href="tel:<?= $psnw_top_bar['psnw_telefono'] ?>"><?= $psnw_top_bar['psnw_telefono'] ?></a>
                    <span class="mailus"><i class="fa fa-envelope"></i> </span> <a href="mailto:<?= $psnw_top_bar['psnw_correo'] ?>"><?= $psnw_top_bar['psnw_correo'] ?></a>
                    <span class="mailus"><i class="fa fa-clock-o"></i></span> <a href="#"><?= $psnw_top_bar['psnw_horario'] ?></a>
                    <span class="mailus"><i class="fa fa-clock-o"></i></span> <a href="#"></a>
                </p>
            </div>
            <div class="col-12 col-md d-flex justify-content-md-end">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="<?= $psnw_redes_sociales['facebook'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="<?= $psnw_redes_sociales['twitter'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="<?= $psnw_redes_sociales['instagram'] ?>" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
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

        <?php

        $url = $_SERVER["REQUEST_URI"];
        $page = explode('/', $url);

        $inicio = $page[2] == '' ? 'active' : '';
        $about = $page[2] == 'about' ? 'active' : '';
        $servicio = $page[2] == 'services' ? 'active' : '';
        $contact = $page[2] == 'contact' ? 'active' : '';

        ?>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item <?= $inicio ?>"><a href="<?= HTTP_HOST ?>" class="nav-link">Inicio</a></li>
                <li class="nav-item <?= $about ?>"><a href="about" class="nav-link">Sobre</a></li>
                <li class="nav-item <?= $servicio ?>"><a href="services" class="nav-link">Servicios</a></li>
                <li class="nav-item "><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item <?= $contact ?>"><a href="contact" class="nav-link">Contacto</a></li>
            </ul>
        </div>
        <div class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-primary btn-lg my-2 my-sm-0" id="tooltip-1" title="¡Mira el estatus de tu repación!" data-toggle="modal" data-target="#mdlConsultarSrv">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</nav>

<!-- END nav -->

<!-- Modal -->
<div class="modal fade" id="mdlConsultarSrv" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡Entérate del estado de tu reparación!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formConsultarServicio">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="srv_codigo" placeholder="Ingresa tu código" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-load" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="row informacion">
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ATRIBUTOS</th>
                                    <th>INFORMACIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Número de orden</td>
                                    <td id="orden" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Cliente</td>
                                    <td id="cliente" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Fecha servicio</td>
                                    <td id="fecha" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Estado</td>
                                    <td id="estado" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Tipo equipo:</td>
                                    <td id="tipo" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Marca:</td>
                                    <td id="marca" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Modelo:</td>
                                    <td id="modelo" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Color:</td>
                                    <td id="color" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Estado físico:</td>
                                    <td id="estado_fisico" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Problema:</td>
                                    <td id="problema" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Sólución:</td>
                                    <td id="solucion" style="font-weight:bold;"></td>
                                </tr>
                                <tr>
                                    <td scope="row">Nota:</td>
                                    <td id="nota" style="font-weight:bold;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>