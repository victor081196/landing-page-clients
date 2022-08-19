<?php
include_once 'config.php';


$url_sitio = substr(HTTP_HOST, 0, -1);
$psnw_id_suscriptor = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/url/" . base64_encode($url_sitio)), true);
$id_suscriptor = $psnw_id_suscriptor['psnw_id_suscriptor'];
$res = json_decode(file_get_contents("http://localhost/softmor-pos/api/public/sitioweb/personalizacion/suscriptor/" . $id_suscriptor), true);

$url = $_SERVER["REQUEST_URI"];
$page = explode('/', $url);
switch ($page[2]) {
	case "":
		$title = "Inicio";
		break;
	case "about":
		$title = "Sobre nosotros";
		break;
	case "services":
		$title = "Servicios";
		break;
	case "contact":
		$title = "Contacto";
		break;
	case "terms":
		$title = "Terminos y condiciones";
		break;
	case "privacy":
		$title = "Privacidad y politíca";
		break;
	default:
		break;
}

?>

<head>
	<title><?= $title ?></title>
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