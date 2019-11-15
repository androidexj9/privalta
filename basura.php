<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}
?>

<?php require_once("header.php"); ?>

<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
<script>
$(function() {
	$('#slides').slidesjs({
		width: 940,
		height: 528,
		play: {
			active: true,
			auto: true,
			interval: 4000,
			swap: true
		}
	});
});
</script>
<!-- End SlidesJS Required -->

<!-- Banner Basura -->
<section id="banner">
	<div class="content">
		<header>
			<h2>Reciclar, reutilizar y reducir basura.</h2>
		</header>
		<p>¡Vecin@ ayudanos a separar <b>correctamente</b> la basura, as&iacute; facilitar&eacute;mos su pronta recolecci&oacute;n!.</p>

		<div id="slides">
	      	<img src="public/img/basura/banner_pag-01.png" title="" width="100%">
	      	<img src="public/img/basura/banner_pag-02.png" title="" width="100%">
	      	<img src="public/img/basura/banner_pag-03.png" title="" width="100%">
	      	<img src="public/img/basura/banner_pag-04.png" title="" width="100%">
	      	<img src="public/img/basura/banner_pag-05.png" title="" width="100%">
	      	<img src="public/img/basura/banner_pag-06.png" title="" width="100%">
	    </div><br>

	    <div class="embed-container">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/cmxgUNBzmzs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div><br>

		<p>Fuente: <a href="http://data.sedema.cdmx.gob.mx/nadf24/" target="_blank">http://data.sedema.cdmx.gob.mx/nadf24/</a></p>

	</div>
</section>
<!-- Banner Basura -->

<?php require_once("footer.php"); ?>