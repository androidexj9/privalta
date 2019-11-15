<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}

require_once("config/config.php");

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

$status = ["<font color='red'>NO PAGADO</font>", "<font color='green'>PAGADO</font>", "<font color='gray'>PENDIENTE</font>", "<font color='red'>CANCELADO</font>"];

//0 - NO PAGADO 1 - PAGADO 2 - PENDIENTE 3 - CANCELADO

// Total de cuotas
$result_cuotas = mysqli_query($con, "SELECT * FROM CUOTAS WHERE MES=".$MONTH." AND ANIO=" . $YEAR . " ORDER BY ID_DEPARTAMENTO ASC");

// Egresos
$result_cat_tipo_egreso = mysqli_query($con, "SELECT * FROM CAT_TIPO_EGRESO WHERE STATUS=1 ORDER BY ID_CAT_TIPO_EGRESO ASC");

$result_egresos = mysqli_query($con, "SELECT E.ID_EGRESO, E.ID_CAT_TIPO_EGRESO, E.MONTO_EGRESO, E.FECHA_REGISTRO, E.STATUS, E.DOCUMENTO_SOPORTE, TIPO.CONCEPTO_EGRESO FROM EGRESO AS E, CAT_TIPO_EGRESO AS TIPO WHERE E.ID_CAT_TIPO_EGRESO=TIPO.ID_CAT_TIPO_EGRESO AND E.MES=".$MONTH." AND E.ANIO=". $YEAR." ORDER BY E.ID_EGRESO ASC");

?>

<?php require_once("header.php"); ?>

<!-- Content -->
<section>
	<header class="main">
		<h2 id="antecedentes">Antecedentes</h2>
		<table>
			<tr>
				<th>Comit&eacute; Anterior</th>
				<th>Nuevo Comit&eacute; de Vigilancia</th>
			</tr>
			<tr>
				<td tyle="vertical-align: top; width: 50%">
					<a href="https://drive.google.com/drive/u/3/folders/1Sbr4O0Y4uZ2QgNjTiODc-7CzmpVICqGn" target="_blank">
						<img src="public/img/comite_anterior.png" width="100px" alt="Google Drive" />
					</a><br>
					<a href="https://drive.google.com/drive/u/3/folders/1Sbr4O0Y4uZ2QgNjTiODc-7CzmpVICqGn" target="_blank">Google Drive</a>
				</td>
				<td style="vertical-align: top; width: 50%">
					<a href="https://drive.google.com/drive/u/3/folders/1bH3FQl-CZSyhONFYRETcKqUhJF174R8C" target="_blank">
						<img src="public/img/comite_anterior.png" width="100px" alt="Google Drive" />
					</a><br>
					<a href="https://drive.google.com/drive/u/3/folders/1bH3FQl-CZSyhONFYRETcKqUhJF174R8C" target="_blank">Google Drive</a>
				</td>
			</tr>
		</table>
	</header>

	<hr class="major" />

	<header class="main">
		<h2 id="proveedores">Proveedores</h2>

		<h3>Limpieza</h3>
		<p>
			Raz&oacute;n social: Multiservicios de Limpieza - Carlos Raul Rivera Lara<br>
			Inicio de Contrato: 1 de octubre 2019 (Per&iacute;odo de Prueba)<br>
			Fin de Contrato: (pendiente)<br>
			Pago Mensual: $40,800.00 M.N
		</p>

		<h3>Vigilancia</h3>
		<p>
			Raz&oacute;n social: Seguridad Privada / Martha Yuridia Crespo Munguía<br>
			Inicio de Contrato: 1 de enero 2020 (Per&iacute;odo de Prueba)<br>
			Fin de Contrato: (pendiente)<br>
			Pago Mensual: $45,000.00 M.N
		</p>
	</header>

	<hr class="major" />

	<header class="main">
		<h2 id="egresos">Egresos - <?= $MONTH_ES . " " . $YEAR ?></h2>
	</header>
	<img src="public/img/alert.png" width="32px" /> (En desarrollo)

	<!--<div class="container-scroll">-->
	<div>
		<table>
			<tr>
				<th>Tipo</th>
				<th>Monto</th>
				<th>Operaci&oacute;n</th>
				<th>Status</th>
				<th>Soporte</th>
			</tr>
			<?php
				$sum = 0; 
				while($row = mysqli_fetch_array($result_egresos)) {
					echo "<tr>";
					echo "<td>". $row['CONCEPTO_EGRESO'] . "</td>";
					echo "<td>". number_format($row['MONTO_EGRESO'], 2, '.', ','). "</td>";
					echo "<td>". $row['FECHA_REGISTRO'] . "</td>";
					echo "<td>". $status[$row['STATUS']] . "</td>";
					if ($row['DOCUMENTO_SOPORTE'] != null) {
						echo "<td><a href='" . $row['DOCUMENTO_SOPORTE'] . "' target='_blank'>PDF</a></td>";
						//echo '<td><a href="'.$row['DOCUMENTO_SOPORTE'] .'" data-lightbox="image-'.$row['ID_EGRESO'].'" data-title="Soporte">PDF</a></td>';
					} else {
						echo "<td>-</td>";
					}
					$sum += $row['MONTO_EGRESO'];
					echo "</tr>";
				} 
			?>
			<tr>
				<!--<td colspan="9">TOTAL: <?= money_format('$%i',$sum); ?></td>-->
				<td colspan="8">TOTAL:  <?= number_format($sum, 2, '.', ','); ?></td>
			</tr>
		</table>
	</div>

	<hr class="major" />

	<header class="main">
		<h2 id="cuotas">Relaci&oacute;n de Cuotas de Mantemiento <?= $MONTH_ES . " " . $YEAR ?></h2>
	</header>
	<!--<div class="container-scroll">-->
	<div>
		<table>
			<tr>
				<th>Departamento</th>
				<th>Monto</th>
				<th>Status</th>
			</tr>
			<?php
				$sum = 0; 
				while($row = mysqli_fetch_array($result_cuotas)) {
					echo "<tr>";
					echo "<td>" . $row['ID_DEPARTAMENTO'] . "</td>";
					echo "<td>$". $row['MONTO'] . "</td>";
					echo "<td>" . $status[$row['STATUS']] . "</td>";
					echo "</tr>";
					$sum += $row['MONTO'];
				}
			?>
			<tr>
				<td colspan="3">TOTAL:  <?= number_format($sum, 2, '.', ','); ?></td>
			</tr>
		</table>
	</div>

	<hr class="major" />
	
	<header class="main">
		<h2 id="estados_de_cuenta">Estados de Cuenta <?= $YEAR ?></h2>
	</header>
	<div class="container-scroll">
		<table>
			<tr>
				<th>Per&iacute;odo</th>
				<th>Status</th>
				<th>Soporte</th>
			</tr>
			<tr>
				<td>02/10/2019 - 31/10/2019</td>
				<!--<td><font size="3" color="gray">PENDIENTE</font></td>-->
				<td><font size="3" color="green">ACTIVO</font></td>
				<td><a href="public/documents/estados/pdf/201910.pdf" target="_blank">PDF</a></td>
			</tr>
		</table>
	</div>
	
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>