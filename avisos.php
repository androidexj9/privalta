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
		<h1>Avisos</h1>
	</header>

	<h2 id="cuotas">Relaci&oacute;n cuotas de mantenimiento</h2>
	<p>Vecin@s: S&iacute; su pago no est&aacute; reflejado en esta relaci&oacute;n favor de ponerse en contacto a: <a href="mailto:comite@privalta.mx">comite@privalta.mx</a></p>

	<iframe width="100%" height="400px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSeGo7DbAuOsD5ySoCxY_DQKUovBsX21Hhuo5IttN5xYmPx-zswtLlO5QVVtAXXXg/pubhtml?widget=true&amp;headers=false"></iframe><br>

	<a href="pagosmantenimiento.xls">Relaci&oacute;n de pagos de mantenimiento (Hist&oacute;rico)</a>

	<hr class="major" />

	<h2 id="clases_gym">Clases - GYM 8:40 p.m</h2>
	<a href="public/img/clases2.jpg" data-lightbox="image-1" data-title="Clases - GYM 8:40 p.m">
		<img src="public/img/clases2.jpg" width="200ox" />
	</a><br>
	<p>
		<ul>
			<li>$35.00 pesos por clase</li>
			<li>Mínimo 15 personas</li>
			<li>Pagos semanales</li>
			<li>5 clases a la semana</li>
		</ul>

		<b>Lunes de Fit:</b><br>
		Gogo Towel: Mediante dos toallas, se trabajan músculos internos, no solamente se gana resistencia muscular sino también cardiovascular, el objetivo es acelerar el metabolismo de trabaja en intervalos y a base de fricciones.<br><br>

		<b>Martes Zumba:</b><br>
		A través de esta disciplina, elevas tu nivel cardiovascular y logras quemar grasas bailando diferentes géneros musicales.<br><br>

		<b>Mi&eacute;rcoles Aerobox:</b><br><br>

		<b>Jueves Yoga:</b><br><br>

		<b>Viernes Insanity:</b><br><br>

		<div class="embed-container">
			<iframe width="100%" height="100%" src="https://www.youtube.com/embed/5ym4RHPqh2I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div><br>

		<h3 style="color: red">GYM - 8:40 p.m</h3>
	</p>

	<!--<h2 id="clases">Clases de Muestra - GYM 8:00 p.m</h2>
	<a href="public/img/clases.jpg" data-lightbox="image-1" data-title="Clases de Muestra - GYM 8:00 p.m">
		<img src="public/img/clases.jpg" width="200ox" />
	</a><br>
	<p>
		<b>Lunes Zumba:</b><br>
		A través de esta disciplina, elevas tu nivel cardiovascular y logras quemar grasas bailando diferentes géneros musicales.<br><br>

		<b>Martes de Fit:</b><br>
		Gogo Towel: Mediante dos toallas, se trabajan músculos internos, no solamente se gana resistencia muscular sino también cardiovascular, el objetivo es acelerar el metabolismo de trabaja en intervalos y a base de fricciones.<br><br>

		<b>Mi&eacute;rcoles Fit:</b><br>
		A diferencia de otras clases de acondicionamiento, esta disciplina te permitirá lograr un desarrollo integral de tu cuerpo, no sólo trabajando con tu fuerza física sino también con tu mente.<br><br>

		<b>Jueves Pilates:</b><br>
		Sistema de entrenamiento físico, uniendo dinamismo y fuerza muscular; aporta vitalidad, agilidad y coordinación; ayuda a mejorar el equilibrio.<br>
	</p>-->
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>
