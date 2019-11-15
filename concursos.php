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
		<h1>Proveedores</h1>
	</header>

	<h2 id="cctv">Especificaciones T&eacute;cnicas - Proveedor de CCTV</h2>
	<iframe width="100%" height="400px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTEPd4R53t7IhnEvTAtvZodnAns6IfUMQZRY2MQsv32h9UGsdJddmcX6_ScMwRO-wCFYXuIvYwtGiCZ/pubhtml?gid=648020128&amp;single=true&amp;widget=true&amp;headers=false"></iframe><br>
	<a href="https://docs.google.com/document/d/1UyMIYT9Md5D3HOpntBhZR7qQnFNt9KPjyaUSgVCUzSo/edit?usp=sharing">Google Drive</a>
</section>

<section>
	<header class="main">
		<h1>Concursos</h1>
	</header>

	<h2 id="limpieza">Bases Concurso - Proveedor de Limpieza</h2>
	<object data="public/documents/concursos/limpieza_30102109.pdf" type="application/pdf" width="100%" height="400px">
		<p>Bases Concurso - Proveedor de Limpieza <a href="public/documents/concursos/limpieza_30102109.pdf">PDF</a></p>
	</object>
	<a href="public/documents/concursos/limpieza_30102109.pdf">PDF</a>
	<hr class="major" />

	<h2 id="seguridad">Bases Concurso - Proveedor de Seguridad</h2>
	<object data="public/documents/concursos/seguridad_30102109.pdf" type="application/pdf" width="100%" height="400px">
		<p>Bases Concurso - Proveedor de Seguridad <a href="public/documents/concursos/seguridad_30102109.pdf">PDF</a></p>
	</object>
	<a href="public/documents/concursos/seguridad_30102109.pdf">PDF</a>
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>