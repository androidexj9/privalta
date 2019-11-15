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
		<h1>Historial de Versiones</h1>
	</header>

	<h2>Release Ver. 1.0 - 21/10/2019</h2>
	<p>Demo</p>
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>