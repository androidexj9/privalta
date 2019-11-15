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
		<h1>Mesas de Trabajo</h1>
	</header>

	<h2>Mesa de Trabajo - Plataforma PRIVALTA</h2>
	<p>Responsable: Oscar S&aacute;nchez</p>

	<h2>Mesa de Trabajo - Comunicaci&oacute;n</h2>
	<p>Responsable: Oscar S&aacute;nchez</p>

	<h2>Mesa de Trabajo - Finanzas</h2>
	<p>Responsable: Gabriela Flores</p>

	<h2>Mesa de Trabajo - Gym & Salones</h2>
	<p>Responsable: H&eacute;ctor Flores</p>

	<h2>Mesa de Trabajo - Mantenimiento</h2>
	<p>Responsable: Oscar Jair Minor</p>

	<h2>Mesa de Trabajo - Protecci&oacute;n Civil</h2>
	<p>Responsable: Oscar Jair Minor</p>

	<h2>Mesa de Trabajo - Seguridad</h2>
	<p>Responsable: Oscar Jair Minor</p>

	<h2>Mesa de Trabajo - Proveedores</h2>
	<p>Responsable: Juan Luis S&aacute;nchez</p>

	<h2>Mesa de Trabajo - Legal</h2>
	<p>Responsable: Juan Luis S&aacute;nchez</p>

	<h2>Mesa de Trabajo - Cultura</h2>
	<p>Responsable: </p>
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>