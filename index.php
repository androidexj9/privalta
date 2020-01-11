<?php
session_start();
?>

<?php require_once("header.php"); ?>

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

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

<!-- Banner Bienvenida -->
<section id="banner">
	<div class="content">
		<header>
			<h1>Bienvenid@s</h1>
			<!-- <p>-</p>-->
		</header>

		<?php if (isset($_SESSION['loggedin'])) { ?>

			<!--<img src="privalta_logo.png" alt="" />-->
			<p>En Plataforma PRIVALTA encontrar&aacute;s informaci&oacute;n relevante acerca de nuestro condominio.</p>

			<div id="slides">
		      	<img src="public/img/banners/bienvenida.jpg" title="Bienvenid@s" width="100%">
		      	<!--<img src="public/img/banners/navidad.jpg" title="Felices Fiestas" width="100%">-->

		      	<a href="avisos.php#clases_gym">
		      		<img src="public/img/banners/clases.jpg" title="Clases de Muestra - GYM 8:00 p.m" width="100%">
		      	</a>
		      	
		      	<a href="procedimientos.php#procedimiento_gas">
		      		<img src="public/img/banners/servicios.jpg" title="¿Conoces los Procedimientos para la contrataci&oacute;n de servicios de tu condominio?" width="100%">
		      	</a>
		      	<a href="procedimientos.php#reglamento">
		      		<img src="public/img/banners/reglamento.jpg" title="¿Conoces el Reglamento del condominio PRIVALTA?" width="100%">
		      	</a>
		      	<a href="basura.php">
		      		<img src="public/img/banners/basura.jpg" title="Te decimos cómo separar tus residuos." width="100%">
		      	</a>
		      	<a href="links.php#mi_policia">
		      		<img src="public/img/banners/mi_policia_1.jpg" title="App Mi Policia" width="100%">
		      	</a>
		    </div><br>

			<p><b>Comit&eacute; 2019 (28/09/2019 - a la fecha)</b><br>
				Presidente: Oscar A. S&aacute;nchez - Depto. 213<br>
				Tesorera: Gabriela Flores - Depto. 718<br>
				Vocal 1: Jair Minor - Depto. 705<br>
				Vocal 2: Juan Luis S&aacute;nchez - Depto. 704<br>
				Vocal 3: H&eacute;ctor Flores - Depto. 412
			</p>

			<p>
				Contador de Visitas:<br>
				<a href="https://www.contadorvisitasgratis.com" title="contador de visitas para web"><img src="https://counter10.wheredoyoucomefrom.ovh/private/contadorvisitasgratis.php?c=kj5pzdmsjn68m15eujkm3sweddkpceu5" border="0" title="contador de visitas para web" alt="contador de visitas para web"></a>
			</p>
		<?php } else { ?>
			<!--<div class="embed-container">
				
			</div>-->
			<div class="embed-container">
				<!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/yGcrVS-eZU0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				-->

				<!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/cmxgUNBzmzs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

				<iframe width="100%" height="100%" src="https://www.youtube.com/embed/vUuJ7Q6R88o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		<?php } ?>
	</div>
</section>
<!-- Banner Bienvenida -->

<?php require_once("footer.php"); ?>