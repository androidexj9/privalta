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

$result_usuarios = mysqli_query($con, "SELECT * FROM USUARIO WHERE USUARIO.ID_CAT_ROL=2 AND STATUS=1 ORDER BY NOMBRE ASC");

$result_departamentos = mysqli_query($con, "SELECT * FROM CAT_DEPARTAMENTO ORDER BY ID_DEPARTAMENTO ASC");
?>

<?php require_once("header.php"); ?>

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

<script>
	$("#departamento_edit").hide();

	function edit(user_id) {
		$("#departamento_edit").show("slow");

		$.ajax({
			url: "departamentos/get.php?id_departamento=" + user_id,
			type: "GET",
			dataType: 'json'
		}).done(function(data) {
			$("#edit_id_departamento").val(data['ID_DEPARTAMENTO']);
			$("#edit_id_departamento_").val(data['ID_DEPARTAMENTO']);
			$("#edit_id_usuario").val(data['ID_USUARIO']);
			$("#edit_fecha_entrega").val(data['FECHA_ENTREGA']);
			$("#edit_status").val(data['STATUS']).change();
		});
	}
 </script>

		<!-- Banner Bienvenida -->
		<section id="banner">
			<div class="content">

				<header>
					<h1>Administraci&oacute;n de Departamentos</h1>
				</header>

				<h2>Consulta</h2>
				<div class="container-scroll">
					<table>
						<tr>
							<th>Departamento</th>
							<th>Cond&oacute;mino</th>
							<th>Fecha Entrega</th>
							<th>Status</th>
							<th>Operaciones</th>
						</tr>
						<?php while($row = mysqli_fetch_array($result_departamentos)) {
							echo "<tr>";
							echo "<td>" . $row['ID_DEPARTAMENTO'] . "</td>";
							echo "<td>" . $row['ID_USUARIO'] . "</td>";
							echo "<td>" . $row['FECHA_ENTREGA'] . "</td>";
							echo "<td>" . ($row['STATUS'] == 1 ? 'Entregado' : 'No Entregado') . "</td>";
							echo "<td><a href='javascript:void(0);' onclick='edit(".$row['ID_DEPARTAMENTO'].");''>Editar</a></td>";
							echo "</tr>";
						} ?>
					</table>
				</div>
				
				<hr class="major" />

				<div id="departamento_edit" style="display: none;">
					<h2>Editar</h2>
					<form method="post" action="departamentos/update.php">
						<input type="hidden" name="edit_id_departamento" id="edit_id_departamento" />
						<input type="text" name="edit_id_departamento_" id="edit_id_departamento_" placeholder="ID" disabled />
						<select name="edit_id_usuario" id="edit_id_usuario">
							<option value="">- Seleccione -</option>
							<?php
								while($valores = mysqli_fetch_array($result_usuarios)){
									echo "<option value='".$valores['ID_USUARIO']."'>".utf8_encode($valores['AP_PATERNO'])." ".utf8_encode($valores['AP_MATERNO'])." ".utf8_encode($valores['NOMBRE'])."</option>";
								}
							?>
						</select>
						<input type="text" name="edit_fecha_entrega" id="edit_fecha_entrega" autocomplete="off" class="datepicker " placeholder="Fecha Entrega" />
						<select name="edit_status" id="edit_status">
							<option value="1">1 - ENTREGADO</option>
							<option value="0">0 - NO ENTREGADO</option>
						</select><br>
						<button type="submit">Actualizar Departmaneto</button>
					</form>
				</div>
				
			</div>
		</section>
		<!-- Banner Bienvenida -->

<?php require_once("footer.php"); ?>