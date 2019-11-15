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
		<h1>Convocatorias</h1>
	</header>

	<!--<header class="main">
		<h2>Hist&oacute;rico</h2>
	</header>
	<a href="#">septiembre</a> | <a href="#">octubre</a>-->
	<hr class="major" />
	
	<h3>Convocatoria de Asamblea Ordinaria PRIVALTA 28/09/2019</h3>
	<p>Publicado 20/09/2019</p>

	<object data="public/documents/convocatorias/20190928.pdf" type="application/pdf" width="100%" height="400px">
		<p>Convocatoria de Asamblea Ordinaria PRIVALTA 28/09/2019 <a href="public/documents/convocatorias/20190928.pdf">PDF</a></p>
	</object>

	<hr class="major" />
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>