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
		<h1>Ingresos vs Egresos</h1>
	</header>
	<table>
		<tr>
			<th>Movimiento</th>
			<th>Cantidad</th>
			<th>Status</th>
			<th>Soporte</th>
		</tr>
		<tr>
			<td>Ejemplo de ingreso</td>
			<td>$6500.00</td>
			<td><font size="3" color="green">VERIFICADO</font></td>
			<td><img src="img/pdf-icon-16x16-1.jpg" width="30" /></td>
		</tr>
		<tr>
			<td>Ejemplo de egreso</td>
			<td>-$3000.00</td>
			<td><font size="3" color="gray">PENDIENTE</font></td>
			<td><img src="img/pdf-icon-16x16-1.jpg" width="30" /></td>
		</tr>
		<tr>
			<td colspan="4">TOTAL: $3,500.00</td>
		</tr>
	</table>
	
	<header class="main">
		<h1>Morosos septiembre 2019</h1>
	</header>
	<table>
		<tr>
			<th>Departamento</th>
			<th>Cuota</th>
			<th>Status</th>
			<th>Comprobante</th>
		</tr>
		<tr>
			<td>211</td>
			<td>$650.00</td>
			<td><font size="3" color="green">PAGADO</font></td>
			<td><img src="img/pdf-icon-16x16-1.jpg" width="30" /></td>
		</tr>
		<tr>
			<td>212</td>
			<td>$650.00</td>
			<td><font size="3" color="green">PAGADO</font></td>
			<td><img src="img/pdf-icon-16x16-1.jpg" width="30" /></td>
		</tr>
		<tr>
			<td>213</td>
			<td>$0.00</td>
			<td><font size="3" color="gray">PENDIENTE</font></td>
			<td><img src="img/pdf-icon-16x16-1.jpg" width="30" /></td>
		</tr>
		<tr>
			<td>214</td>
			<td>$0.00</td>
			<td><font size="3" color="red">NO PAGADO</font></td>
			<td>Sin comprobante</td>
		</tr>
		<tr>
			<td colspan="4">TOTAL: $1,300.00</td>
		</tr>
	</table>
	
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>