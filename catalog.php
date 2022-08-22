<?php
include_once 'config.php';

$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents(URL_API . "sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];

$sucursales = json_decode(file_get_contents(URL_API . "sitioweb/sucursales/suscriptor/" . $id_suscriptor), true);

foreach ($sucursales as $scl) {
  if ($scl['scl_default'] == 1) {
    $scl_default = $scl;
  }
}

$productos = json_decode(file_get_contents(URL_API . $scl_default['scl_id_sucursal'] . "/product/all"), true);
$categorias = json_decode(file_get_contents(URL_API . $scl_default['scl_id_sucursal'] . "/category/all"), true);

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>

<body>

  <?php include_once 'components/top-bar.php'; ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Catálogo de productos</h1>
          <input type="hidden" id="id_suscriptor" value="<?= $id_suscriptor ?>">
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= HTTP_HOST ?>">Inicio <i class="fa fa-chevron-right"></i></a></span> <span>Catálogo de productos <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-body text-dark">
              <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                  <div class="form-group">
                    <label for="">Sucursal</label>
                    <select class="form-control" name="scl_id_sucursal" id="scl_id_sucursal">
                      <option value="">-Seleccionar-</option>
                      <?php foreach ($sucursales as $suc) :
                        if ($suc['scl_default'] == 1) {
                          $selected = "selected";
                        } else {
                          $selected = "";
                        }
                      ?>
                        <option <?= $selected ?> value="<?= $suc['scl_id_sucursal'] ?>"><?= $suc['scl_nombre'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                  <div class="form-group">
                    <label for="cts_id">Categoria</label>
                    <select class="form-control" name="id_categoria" id="id_categoria">
                      <option value="-">Todas</option>
                      <?php foreach ($categorias as $cts) : ?>
                        <option value="<?= $cts['id'] ?>"><?= $cts['categoria'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-xl-4 col-md-12 col-12">
                  <div class="form-group">
                    <label for="" class="text-white">Categoria</label>
                    <button type="button" class="btn btn-primary btn-lg btn-block btnConsultarProductos">Buscar</button>
                  </div>
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
      <!-- <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>¡Nuestras <span>sucursales!</span></h2>
        </div>
      </div> -->
      <div class="row d-flex justify-content-center" id="productos">
        <?php foreach ($productos as $pds) : ?>
          <div class="col-xl-3 col-md-6 col-12 ftco-animate mb-3">
            <div class="card bg-light">
              <div class="row">
                <div class="col-12 p-4">
                  <img class="card-img-top img-fluid" title="<?= $pds['descripcion'] ?>" width="100%" height="200px" src="<?= $pds['imagen'] ?>" style="object-fit: cover;object-position: center center;" alt="">
                </div>
              </div>
              <div class="card-body text-dark">
                <div class="row crd-pds" title="<?= $pds['descripcion'] ?>">
                  <div class="col-12" style="width: 100%;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                    <strong><?= $pds['descripcion'] ?></strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                      <i class="fa fa-star text-warning"></i>
                    <?php endfor; ?>
                  </div>
                </div>
                <p class="card-text">$ <?= number_format($pds['precio_venta'], 0) ?> <button type="button" class="btn btn-sm float-right btnAgregarCarrito" title="Agregar al carrito"><i class="fa fa-shopping-cart fa-lg"></i></button></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include_once 'components/footer.php'; ?>
  <?php include_once 'components/scripts.php'; ?>

  <script>
    $(document).ready(function() {
      $(".btnAgregarCarrito").tooltip();
      $(".crd-pds").tooltip();
    })
  </script>

</body>

</html>