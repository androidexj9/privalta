<?php
session_start();

require_once("../config/config.php");

// db connection config vars
$DATABASE_USER = DBUSER;
$DATABASE_PASS = DBPWD;
$DATABASE_NAME = DBNAME;
$DATABASE_HOST = DBHOST;

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Obtener  perioodo actual
setlocale(LC_ALL, 'es_MX.UTF-8');
$YEAR = date('Y');
$MONTH = date('m');
$a[1] = "enero"; 
$a[2] = "febrero"; 
$a[3] = "marzo"; 
$a[4] = "abril"; 
$a[5] = "mayo"; 
$a[6] = "junio"; 
$a[7] = "julio"; 
$a[8] = "agosto";
$a[9] = "septiembre";
$a[10] = "octubre";
$a[11] = "noviembre";
$a[12] = "diciembre";
$MONTH_ES = $a[date('m')];

$status = ["<font color='red'>NO PAGADO</font>", "<font color='green'>PAGADO</font>", "<font color='gray'>PENDIENTE</font>"];

// Total de cuotas
$result_cuotas = mysqli_query($con, "SELECT * FROM CUOTAS WHERE MES=".$MONTH." AND ANIO=" . $YEAR . " ORDER BY ID_DEPARTAMENTO ASC");
?>

<?php require_once("header.php"); ?>

		<!-- Banner Bienvenida -->
		<section id="banner">
			<div class="content">

				<header>
					<h1>Administraci&oacute;n de Cuotas</h1>
				</header>

				<hr class="major" />

				<header class="main">
					<h2> > Relaci&oacute;n de Cuotas de Mantemiento <?= $MONTH_ES . " " . $YEAR ?></h2>
				</header>
				<div class="container-scroll">
					<table>
						<tr>
							<th>Departamento</th>
							<th>Monto</th>
							<th>Status</th>
							<th>Comprobante</th>
						</tr>
						<?php while($row = mysqli_fetch_array($result_cuotas)) {
							echo "<tr>";
							echo "<td>" . $row['ID_DEPARTAMENTO'] . "</td>";
							echo "<td>$". $row['MONTO'] . "</td>";
							echo "<td>" . $status[$row['STATUS']] . "</td>";
							if ($row['DOCUMENTO_SOPORTE'] != null) {
								echo "<td><a href='" . $row['DOCUMENTO_SOPORTE'] . "' target='_blank'>PDF</a></td>";
							} else {
								echo "<td>Sin Comprobante</td>";
							}
							echo "</tr>";
						} ?>
						<tr>
							<td colspan="4">TOTAL: $0.00</td>
						</tr>
					</table>
				</div>

			</div>
		</section>
		<!-- Banner Bienvenida -->

<?php require_once("footer.php"); ?>