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

$ID_USUARIO = $_SESSION['user_id'];

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

// Registro de Cuotas - Mes vigente
// 0 NO PAGADO
// 1 PAGADO
// 2 PEDIENTE
$result_cuota = mysqli_query($con, "SELECT * FROM CUOTAS WHERE ID_USUARIO=". $ID_USUARIO . " AND ANIO=" . $YEAR . " AND MES=" . $MONTH . " AND STATUS IN(1,2)");
$cuotas_no_pagadas = $result_cuota->num_rows;

// Total de cuotas
$result_cuotas = mysqli_query($con, "SELECT * FROM CUOTAS WHERE ID_USUARIO=". $ID_USUARIO . " AND ANIO=" . $YEAR . " ORDER BY MES ASC");
?>

<?php require_once("header.php"); ?>

<!-- Content -->
<section>
	<header class="main">
		<h1>Mi cuenta</h1>
	</header>

	<h2>Cambiar Contrase&ntilde;a</h2>
	<form action="nuevo_password.php" method="post" id="cambiar_password">
		<div class="form-group">
			<label for="new_password">Nueva Contrase&ntilde;a:</label>
			<input type="password" 
				   name="new_password" 
				   id="new_password" 
				   placeholder="Contrase&ntilde;a"
				   data-validation="strength"
				   data-validation-strength="1"
				   data-validation-error-msg="Ingrese una Contrase&ntilde;a v&aacute;lida. S&oacute;lo se permiten caracteres alfanum&eacute;ricos."
				   data-validation-help="Ingrese Contrase&ntilde;a." />
		</div><br>
		<input type="submit" value="Actualizar Contrase&ntilde;a" name="submit">
	</form>

	<hr class="major" />

	<?php if ($_SESSION['user_rol'] == 2) { ?>
	<h2>Registrar Cuota de Mantenimiento - <?= $MONTH_ES . " " . $YEAR ?></h2>
	<!--<img src="public/img/alert.png" width="32px" />-->
	<h3 style="color: red">Recuerda vecin@ que los pagos de las Cuotas de Mantenimiento no se permiten en efectivo.</h3>

	<?php if ($cuotas_no_pagadas == 0) { ?>
		<form action="registrar_pago.php" method="post" enctype="multipart/form-data" id="registrar_pago">
			<div class="form-group">
				<label for="monto">Monto: $</label>
				<input type="text" 
					   name="monto" 
					   id="monto" 
					   placeholder="Monto"
					   data-validation="number" 
					   data-validation-allowing="float"
					   data-validation-error-msg="Ingrese un Monto v&aacute;lido. S&oacute;lo se permiten cantidades con decimales."
					   data-validation-help="Ingrese el monto de su comprobante." />
			</div>

			<div class="form-group">
				<label for="file">Adjuntar Comprobante de Pago (PDF, JPG, PNG, tama&ntilde;o m&aacute;x a 2 MB):</label>
				<input type="file" 
					   name="file" 
					   id="file"
					   data-validation="mime size" 
					   data-validation-allowing="pdf, jpg, png" 
					   data-validation-max-size="2M"
					   data-validation-error-msg="Ingrese un Archivo v&aacute;lido. S&oacute;lo se permiten archivos de tipo PDF, JPG, PNG y de un tama&ntilde;o m&aacute;x a 2 MB."
					   data-validation-help="Ingrese su comprobante.">
			</div><br>
			<input type="submit" value="Registrar Comprobante" name="submit">
		</form>
	<?php } else { ?>
		<font color='green'>Comprobante cargado.</font>
	<?php } ?>
	<br><br><p>* Una vez que registr&oacute; su comprobante el status es <font color='gray'>PENDIENTE</font>, a fin de mes despu&eacute;s de que la <b>Mesa de Contabilidad</b> hace la conciliación el status cambiar&aacute; a <font color='green'>PAGADO</font>.</p>

	<hr class="major" />

	<h2>Mis Cuotas de Mantenimiento - <?= $YEAR ?></h2>
	<table>
		<tr>
			<th>Mes</th>
			<th>Departamento</th>
			<th>Monto</th>
			<th>Status</th>
			<th>Comprobante</th>
		</tr>
		<?php while($row = mysqli_fetch_array($result_cuotas)) {
			echo "<tr>";
			echo "<td>" . $a[$row['MES']] . "</td>";
			echo "<td>" . $row['ID_DEPARTAMENTO'] . "</td>";
			echo "<td>$". $row['MONTO'] . "</td>";
			echo "<td>" . $status[$row['STATUS']] . "</td>";
			if ($row['DOCUMENTO_SOPORTE'] != null) {
				echo "<td><a href='".$row['DOCUMENTO_SOPORTE']."' target='_blank'>Comprobante</a></td>";
			} else {
				echo "<td>Sin Comprobante</td>";
			}
			echo "</tr>";
		} ?>
	</table>
	<?php } ?>

	<hr class="major" />
</section>
<!-- Content -->

<script>
	$.validate({
		lang: 'es',
		modules : ['security', 'file' ],
		onModulesLoaded : function() {
			var optionalConfig = {
				fontSize: '12pt',
				padding: '4px',
				bad : 'Very bad',
				weak : 'Weak',
				good : 'Good',
				strong : 'Strong'
			};
		$('input[name="password"]').displayPasswordStrength(optionalConfig);
		}
	});

	/*$.validate({
		lang: 'es',
		modules : 'file'
	});*/
</script>

<?php require_once("footer.php"); ?>
