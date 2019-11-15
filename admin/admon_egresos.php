<?php
	session_start();
?>

<?php require_once("header.php"); ?>

		<!-- Banner Bienvenida -->
		<section id="banner">
			<div class="content">

				<header>
					<h1>Administraci&oacute;n de Egresos</h1>
				</header>

				<hr class="major" />

				<h2>Carga</h2>
				<form method="post" action="egresos/carga.php">
					<input type="file" name="file" id="file"><br>
					<button type="submit">Guardar</button>
				</form>
			</div>
		</section>
		<!-- Banner Bienvenida -->

<?php require_once("footer.php"); ?>