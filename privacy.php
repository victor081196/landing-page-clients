<?php
include_once 'config.php';


$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents(URL_API . "sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];

$pgn = json_decode(file_get_contents(URL_API . "sitioweb/paginas/suscriptor/" . $id_suscriptor), true);
$pgn_privacidad = json_decode($pgn['pgn_privacidad'], true);
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>

    <?php include_once 'components/top-bar.php'; ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= $pgn_privacidad['banner'] ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Privacidad y Política</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>Privacidad y Política <i class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 heading-section text-center ftco-animate">
                    <p><?= $pgn_privacidad['contenido'] ?></hp>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'components/footer.php'; ?>
    <?php include_once 'components/scripts.php'; ?>

</body>

</html>