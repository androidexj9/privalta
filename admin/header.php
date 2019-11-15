<!DOCTYPE HTML>
<html>
	<head>
		<title>Administraci&oacute;n - Plataforma PRIVALTA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../public/assets/css/main.css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" type="text/css"/>
		
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

		<script>
			/*$(function() {
				$("#accordion").accordion();
			});*/
		</script>
		
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<div id="main">
				<div class="inner">

					<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">Administraci&oacute;n Plataforma PRIVALTA</a> <br><br>
						
						<ul class="icons">
							<?php
								if (isset($_SESSION['loggedin_admin'])) {
									echo '<li><span class="label">Bienvenid@: '.$_SESSION['admin_user_name'].' |</span></li>';
									echo '<li><span class="label">Cerrar sesi&oacute;n <a href="logout.php">[X]</a></span></li>';
								}
							?>
						</ul>
					</header>