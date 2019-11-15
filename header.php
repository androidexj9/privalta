<!DOCTYPE HTML>
<html>
	<head>
		<title>Plataforma PRIVALTA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="public/assets/css/main.css" />
		<link rel="stylesheet" href="public/assets/css/lightbox.css" />
		<link rel="stylesheet" href="public/assets/css/slides.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" type="text/css"/>
		
		<!--<script src="public/assets/js/jquery.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script src="public/assets/js/browser.min.js"></script>
		<script src="public/assets/js/breakpoints.min.js"></script>
		<script src="public/assets/js/util.js"></script>
		<script src="public/assets/js/main.js"></script>
		<script src="public/assets/js/lightbox.js"></script>

		<!-- SlidesJS Required: Link to jquery.slides.js -->
		<script src="public/assets/js/jquery.slides.min.js"></script>
		<!-- End SlidesJS Required -->

		<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150654496-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-150654496-1');
		</script>

		<!--<script>
			$(function() {
				$( "#accordion" ).accordion();
			});
		</script>-->
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">
				<div class="inner">

					<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Plataforma<strong></strong> PRIVALTA</a>
						
						<ul class="icons">
							<?php
								if (isset($_SESSION['loggedin'])) {
									echo '<li><span class="label">Bienvenid@: '.$_SESSION['user_name']. ' (' .$_SESSION['user_id_departamento'] .') |</span></li>';
									echo '<li><span class="label"><a href="mi_cuenta.php">Mi cuenta</a> |</span></li>';
									echo '<li><span class="label">Cerrar sesi&oacute;n <a href="logout.php">[X]</a></span></li>';
								}
							?>
						</ul>
					</header>		