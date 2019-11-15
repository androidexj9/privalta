<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}
?>

<?php require_once("header.php"); ?>

<!-- Content -->
<section>
	<header class="main">
		<h1>Asambleas</h1>
	</header>

	<!--<header class="main">
		<h2>Hist&oacute;rico</h2>
	</header>
	<a href="#">septiembre</a> | <a href="#">octubre</a>-->
	<hr class="major" />

	<h3>Asamblea Ordinaria PRIVALTA 28/09/2019</h3>
	<p>Publicado - 28/09/2019</p>

	<object data="public/documents/asambleas/20190928.pdf" type="application/pdf" width="100%" height="400px">
		<p>Asamblea Ordinaria PRIVALTA 28 Septiembre 2019 <a href="public/documents/asambleas/20190928.pdf">PDF</a></p>
	</object>

	<p><b>Acuerdos:</b> Se acord&oacute; que el s&aacute;bado 5 de octubre de 2019, se llevar&aacute; acabo La Transici&oacute;n de Comité a Comité a Las 10 a.m.</p>

	<p><b>Pendientes:</b> - </p>

	<hr class="major" />
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>
