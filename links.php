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
		<h1>Links</h1>
	</header>

	<h2 id="administracion">Administraci&oacute;n Adymi</h2>
	<!--<img src="public/img/icon_whatsApp.png" width="16px"/> WhatsApp: +52 1 55 6871 2688<br>-->
	Correo: <a href="maito:contacto@adymidemexico.com">contacto@adymidemexico.com</a><br>
	Sitio Web <a href="https://www.adymidemexico.com">https://www.adymidemexico.com</a><br><br>

	<h2 id="comite">Comit&eacute;</h2>
	<img src="public/img/icon_whatsApp.png" width="16px"/> Grupo WhatsApp: <a href="https://chat.whatsapp.com/LPYJKHs5GIEEup3zqDCRg3">Comunicados Nuevo Comit&eacute;</a><br>
	Correo Oficial: <a href="mailto:comite@privalta.mx">comite@privalta.mx</a><br>
	Correo Alterno: <a href="mailto:comiteprivalta@gmail.com">comiteprivalta@gmail.com</a>

	<hr class="major" />

	<h2 id="delegacion">Delegaci&oacute;n Iztacalco</h2>
	<a href="http://www.iztacalco.cdmx.gob.mx/inicio/">Sitio Oficial</a><br>
	<a href="http://www.iztacalco.cdmx.gob.mx/inicio/index.php/tramites-y-servicios/servicios">Subdirecci&oacute;n del Centro de Servicios y Atenci&oacute;n Ciudadana</a>

	<hr class="major" />

	<h2 id="mi_policia">App Mi Policia</h2>
	<a href="public/img/mi_policia_1.jpg" data-lightbox="image-1" data-title="App Mi Policia">
		<img src="public/img/mi_policia_1.jpg" width="200px" />
	</a> 
	<a href="public/img/mi_policia_2.jpg" data-lightbox="image-2" data-title="App Mi Policia">
		<img src="public/img/mi_policia_2.jpg" width="200ox" />
	</a> 
	<a href="public/img/mi_policia_3.jpg" data-lightbox="image-3" data-title="App Mi Policia">
		<img src="public/img/mi_policia_3.jpg" width="200ox" />
	</a><br><br>
	Sitio Oficial: <a href="https://www.ssc.cdmx.gob.mx/ciudadania/mi-policia">https://www.ssc.cdmx.gob.mx/ciudadania/mi-policia</a>

	<hr class="major" />

	<h2 id="ley">Ley de Propiedad en Condominio de Inmuebles</h2>
	<p>Publicada en la Gaceta Oficial del Distrito Federal el 27 de enero de 2011<br>&Uacute;ltima reforma publicada en la Gaceta Oficial del Distrito Federal el 24 de marzo de 2017</p>
	<object data="public/documents/LEY_PROPIEDAD.pdf" type="application/pdf" width="100%" height="400px">
		<p>Ley de Propiedad en Condominio de Inmuebles <a href="public/documents/LEY_PROPIEDAD.pdf">PDF</a></p>
	</object><br>
	<a href="https://www.prosoc.cdmx.gob.mx/storage/app/uploads/public/5d9/27c/a52/5d927ca52886b711582860.pdf">PDF</a>
	<hr class="major" />

	<h2 id="prosoc">Procuraduria Social de la Ciudad de M&eacute;xico - PROSOC</h2>
	<a href="https://www.prosoc.cdmx.gob.mx">Sitio Oficial</a><br>
	<a href="https://www.prosoc.cdmx.gob.mx/convocatorias/cursoss">Cursos</a>

</section>
<!-- Content -->

<?php require_once("footer.php"); ?>