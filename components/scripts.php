
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


	
<script>
    $(document).ready(function() {
        $(".informacion").hide();
        $("#tooltip-1").tooltip();
        $("#tooltip-1").focus();
    })

    function startLoadButton() {
        $(".btn-load").attr("disabled", true);
        $(".btn-load").html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Por favor espere...`)
    }

    function stopLoadButton(label) {
        $(".btn-load").attr("disabled", false);
        $(".btn-load").html('ACEPTAR')
    }
    $("#formConsultarServicio").on("submit", function(e) {
        e.preventDefault();
        var srv_codigo = $("#srv_codigo").val();
        $.ajax({
            type: "GET",
            url: 'https://app.softmor.com/api/public/get-data-service/' + srv_codigo,
            // data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                startLoadButton()
            },
            success: function(res) {
                stopLoadButton()
                if (res[0].data_service.orden) {
                    $(".informacion").show();
                    $("#orden").text(res[0].data_service.orden)
                    $("#cliente").text(res[0].data_service.nombre)
                    $("#fecha").text(res[0].data_service.fecha_reparacion)
                    $("#estado").text(res[0].data_service.estado_equipo)
                    $("#tipo").text(res[0].data_service.equipo)
                    $("#marca").text(res[0].data_service.marca)
                    $("#modelo").text(res[0].data_service.modelo)
                    $("#color").text(res[0].data_service.color)
                    $("#estado_fisico").text(res[0].data_service.estado_fisico)
                    $("#problema").text(res[0].data_service.problema)
                    $("#solucion").text(res[0].data_service.solucion)
                    $("#nota").text(res[0].data_service.nota)
                } else {
                    $(".informacion").hide();

                }
            }
        })
    });

    $('#mdlConsultarSrv').on('hidden.bs.modal', function(e) {
        $("#formConsultarServicio")[0].reset();
        $(".informacion").hide();
    })
</script>