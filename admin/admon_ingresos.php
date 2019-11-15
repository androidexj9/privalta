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

$status = ["<font color='red'>PENDIENTE</font>", "<font color='green'>VALIDADO</font>"];

$result_cat_tipo_ingreso = mysqli_query($con, "SELECT * FROM CAT_TIPO_INGRESO WHERE STATUS=1 ORDER BY ID_CAT_TIPO_INGRESO ASC");
$result_cat_departamento = mysqli_query($con, "SELECT * FROM CAT_DEPARTAMENTO ORDER BY ID_DEPARTAMENTO ASC");

$result_cat_tipo_ingreso2 = mysqli_query($con, "SELECT * FROM CAT_TIPO_INGRESO WHERE STATUS=1 ORDER BY ID_CAT_TIPO_INGRESO ASC");
$result_cat_departamento2 = mysqli_query($con, "SELECT * FROM CAT_DEPARTAMENTO ORDER BY ID_DEPARTAMENTO ASC");

// Ingresos
$result_ingresos = mysqli_query($con, "SELECT I.ID_INGRESO, I.ID_CAT_TIPO_INGRESO, I.ID_DEPARTAMENTO, I.MONTO_INGRESO, I.ANIO, 1.MES, I.FECHA_REGISTRO, I.FECHA_MODIFICACION, I.DOCUMENTO_SOPORTE, I.COMENTARIOS, I.STATUS, TIPO.CONCEPTO_INGRESO FROM `INGRESO` AS I, `CAT_TIPO_INGRESO` TIPO WHERE TIPO.ID_CAT_TIPO_INGRESO = I.ID_CAT_TIPO_INGRESO AND I.MES=".$MONTH." AND I.ANIO=". $YEAR." ORDER BY I.FECHA_REGISTRO ASC");
?>

<?php require_once("header.php"); ?>

<script>
	$("#ingreso_edit").hide();

	function edit(ingreso_id) {
		$("#ingreso_edit").show("slow");

		$.ajax({
			url: "ingresos/get.php?ingreso_id=" + ingreso_id,
			type: "GET",
			dataType: 'json'
		}).done(function(data) {
			$("#edit_ingreso_id").val(data['ID_INGRESO']);
			$("#edit_id_cat_tipo_ingreso").val(data['ID_CAT_TIPO_INGRESO']);
			$("#edit_id_departamento").val(data['ID_DEPARTAMENTO']);
			$("#edit_monto_ingreso").val(data['MONTO_INGRESO']);
			$("#edit_fecha_registro").val(data['FECHA_REGISTRO']);
			$("#edit_documento_soporte").val(data['DOCUMENTO_SOPORTE']);
			$("#edit_comentarios").val(data['COMENTARIOS']);
			$("#edit_status").val(data['STATUS']).change();
		});
	}
</script>

<script>
$(document).ready(function() {
  $(function() {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      showButtonPanel: false,
      changeMonth: false,
      changeYear: false,
      /*showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      minDate: '+1D',
      maxDate: '+3M',*/
      inline: true
    });
  });
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
});
</script>

<!-- Banner Bienvenida -->
<section id="banner">
	<div class="content">

		<header>
			<h1>Administraci&oacute;n de Ingresos</h1>
		</header>

		<hr class="major" />

		<h2>Registro</h2>
		<div>
			<form method="post" action="ingresos/registro.php" enctype="multipart/form-data" id="registrar_ingreso">
				<div class="form-group">
					<label for="id_cat_tipo_ingreso">Tipo Ingreso:</label>
					<select name="id_cat_tipo_ingreso" id="id_cat_tipo_ingreso" data-validation="required">
						<option value="">- SELECCIONE -</option>
						<?php 
							while($row_tipo_ingreso = mysqli_fetch_array($result_cat_tipo_ingreso)) {
								echo '<option value="'.$row_tipo_ingreso["ID_CAT_TIPO_INGRESO"].'">'.$row_tipo_ingreso["CLABE_INGRESO"].' - '.$row_tipo_ingreso["CONCEPTO_INGRESO"].'</option>';
							} 
						?>
					</select>
				</div><br>

				<div class="form-group">
					<label for="id_departamento">Departamento:</label>
					<select name="id_departamento" id="id_departamento">
						<option value="0">- SELECCIONE -</option>
						<?php 
							while($row_cat_departamento = mysqli_fetch_array($result_cat_departamento)) {
								echo '<option value="'.$row_cat_departamento["ID_DEPARTAMENTO"].'">'.$row_cat_departamento["ID_DEPARTAMENTO"].'</option>';
							} 
						?>
					</select>
				</div><br>

				<div class="form-group">
					<label for="monto_ingreso">Monto: $</label>
					<input type="text" 
						   name="monto_ingreso" 
						   id="monto_ingreso" 
						   placeholder="Monto"
						   data-validation="number" 
						   data-validation-allowing="float"
						   data-validation-error-msg="Ingrese un Monto v&aacute;lido. S&oacute;lo se permiten cantidades con decimales."
						   data-validation-help="Ingrese el monto de su comprobante." />
				</div><br>

				<div class="form-group">
					<label for="fecha_registro">Fecha Registro:</label>
					<input type="text" 
						   name="fecha_registro" 
						   id="fecha_registro" 
						   autocomplete="off" 
						   class="datepicker " 
						   placeholder="Fecha Registro"
						   data-validation="date" 
						   data-validation-format="yyyy-mm-dd" />
				</div><br>

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

				<div class="form-group">
					<label for="comentarios">Comentarios:</label>
					<textarea rows="4" 
							  cols="20"
							  name="comentarios"
							  id="comentarios" 
							  placeholder="Comentarios"></textarea>
				</div><br>

				<div class="form-group">
					<label for="status">Status:</label>
					<select name="status" id="status" data-validation="required">
						<option value="">- SELECCIONE -</option>
						<option value="0">0 - PENDIENTE</option>
						<option value="1">1 - VALIDADO</option>
					</select>
				</div><br>

				<button type="submit">Registrar Ingreso</button>
			</form>
		</div>

		<hr class="major" />
		
		<h2>Consulta</h2>
		<div>
			<table>
				<tr>
					<th>ID</th>
					<th>Tipo</th>
					<th>Monto</th>
					<th>A&ntilde;o</th>
					<th>Mes</th>
					<th>Operaci&oacute;n</th>
					<th>Modificaci&oacute;n</th>
					<th>Status</th>
					<th>Soporte</th>
					<th>Editar</th>
				</tr>
				<?php
				$sum = 0; 
				while($row = mysqli_fetch_array($result_ingresos)) {
					echo "<tr>";
					echo "<td>" . $row['ID_INGRESO'] . "</td>";
					echo "<td>" . $row['CONCEPTO_INGRESO'] . "</td>";
					echo "<td>$". $row['MONTO_INGRESO']. "</td>";
					echo "<td>". $row['ANIO'] . "</td>";
					echo "<td>". $row['MES'] . "</td>";
					echo "<td>". $row['FECHA_REGISTRO'] . "</td>";
					echo "<td>". $row['FECHA_MODIFICACION'] . "</td>";
					echo "<td>" . $status[$row['STATUS']] . "</td>";
					if ($row['DOCUMENTO_SOPORTE'] != null) {
						echo "<td><a href='../" . $row['DOCUMENTO_SOPORTE'] . "' target='_blank'>PDF</a></td>";
					} else {
						echo "<td>-</td>";
					}
					echo "<td><a href='javascript:void(0);' onclick='edit(".$row['ID_INGRESO'].");''>Editar</a></td>";

					$sum += $row['MONTO_INGRESO'];
					echo "</tr>";
				} ?>
				<tr>
					<!--<td colspan="9">TOTAL: <?= money_format('$%i',$sum); ?></td>-->
					<td colspan="8">TOTAL: <?= number_format($sum, 2, '.', ','); ?></td>
				</tr>
			</table>
		</div>

		<hr class="major" />

		<div id="ingreso_edit" style="display: none;">
			<h2>Editar</h2>
			<form method="post" action="ingresos/update.php">
				<input type="hidden" name="edit_ingreso_id" id="edit_ingreso_id" placeholder="ID" />

				<div class="form-group">
					<label for="edit_id_cat_tipo_ingreso">Tipo Ingreso:</label>
					<select name="edit_id_cat_tipo_ingreso" id="edit_id_cat_tipo_ingreso" data-validation="required">
						<option value="">- SELECCIONE -</option>
						<?php 
							while($row_tipo_ingreso2 = mysqli_fetch_array($result_cat_tipo_ingreso2)) {
								echo '<option value="'.$row_tipo_ingreso2["ID_CAT_TIPO_INGRESO"].'">'.$row_tipo_ingreso2["CLABE_INGRESO"].' - '.$row_tipo_ingreso2["CONCEPTO_INGRESO"].'</option>';
							} 
						?>
					</select>
				</div><br>

				<div class="form-group">
					<label for="edit_id_departamento">Departamento:</label>
					<select name="edit_id_departamento" id="edit_id_departamento">
						<option value="0">- SELECCIONE -</option>
						<?php 
							while($row_cat_departamento2 = mysqli_fetch_array($result_cat_departamento2)) {
								echo '<option value="'.$row_cat_departamento2["ID_DEPARTAMENTO"].'">'.$row_cat_departamento2["ID_DEPARTAMENTO"].'</option>';
							} 
						?>
					</select>
				</div><br>

				<div class="form-group">
					<label for="edit_monto_ingreso">Monto: $</label>
					<input type="text" 
						   name="edit_monto_ingreso" 
						   id="edit_monto_ingreso" 
						   placeholder="Monto"
						   data-validation="number" 
						   data-validation-allowing="float"
						   data-validation-error-msg="Ingrese un Monto v&aacute;lido. S&oacute;lo se permiten cantidades con decimales."
						   data-validation-help="Ingrese el monto de su comprobante." />
				</div><br>

				<div class="form-group">
					<label for="edit_fecha_registro">Fecha Registro:</label>
					<input type="text" 
						   name="edit_fecha_registro" 
						   id="edit_fecha_registro" 
						   autocomplete="off" 
						   class="datepicker " 
						   placeholder="Fecha Registro"
						   data-validation="date" 
						   data-validation-format="yyyy-mm-dd" />
				</div><br>

				<div class="form-group">
					<label for="edit_file">Adjuntar Comprobante de Pago (PDF, JPG, PNG, tama&ntilde;o m&aacute;x a 2 MB):</label>
					<input type="file" 
						   name="edit_file" 
						   id="edit_file"
						   data-validation="mime size" 
						   data-validation-allowing="pdf, jpg, png" 
						   data-validation-max-size="2M"
						   data-validation-error-msg="Ingrese un Archivo v&aacute;lido. S&oacute;lo se permiten archivos de tipo PDF, JPG, PNG y de un tama&ntilde;o m&aacute;x a 2 MB."
						   data-validation-help="Ingrese su comprobante.">
				</div><br>

				<div class="form-group">
					<label for="edit_comentarios">Comentarios:</label>
					<textarea rows="4" 
							  cols="20" 
							  name="edit_comentarios" 
							  id="edit_comentarios" 
							  placeholder="Comentarios"></textarea>
				</div><br>

				<div class="form-group">
					<label for="edit_status">Status:</label>
					<select name="edit_status" id="edit_status" data-validation="required">
						<option value="">- SELECCIONE -</option>
						<option value="0">0 - PENDIENTE</option>
						<option value="1">1 - VALIDADO</option>
					</select>
				</div><br>

				<button type="submit">Actualizar Ingreso</button>
			</form>
		</div>

		<hr class="major" />
		
		<h2>Carga</h2>
		<div>
			<form method="post" action="ingresos/carga.php">
				<input type="file" name="file" id="file"><br>
				<button type="submit">Guardar</button>
			</form>
		</div>
	</div>
</section>
<!-- Banner Bienvenida -->

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
		}
	});
</script>

<?php require_once("footer.php"); ?>