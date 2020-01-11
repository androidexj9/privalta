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

$result_usuarios = mysqli_query($con, "SELECT * FROM USUARIO WHERE USUARIO.ID_CAT_ROL = 2 ORDER BY USUARIO.STATUS DESC");
?>

<?php require_once("header.php"); ?>

<script>
	$("#user_edit").hide();

	function edit(user_id) {
		$("#user_edit").show("slow");

		$.ajax({
			url: "usuarios/get.php?user_id=" + user_id,
			type: "GET",
			dataType: 'json'
		}).done(function(data) {
			$("#edit_user_id").val(data['ID_USUARIO']);
			$("#edit_correo").val(data['CORREO']);
			$("#edit_password").val('');
			$("#edit_nombre").val(data['NOMBRE']);
			$("#edit_ap_paterno").val(data['AP_PATERNO']);
			$("#edit_ap_materno").val(data['AP_MATERNO']);
			$("#edit_status").val(data['STATUS']).change();
		});
	}
</script>

<!-- Banner Bienvenida -->
<section id="banner">
	<div class="content">

		<header>
			<h1>Administraci&oacute;n de Usuarios</h1>
		</header>

		<h2>Registro</h2>
		<div>
			<form method="post" action="usuarios/registro.php" id="registro_usuarios">
				<div class="form-group">
					<label for="correo">Email:</label>
					<input type="text" 
						   name="correo" 
						   id="correo" 
						   placeholder="Email" 
						   data-validation="email"
						   data-validation-error-msg="Ingrese un Email v&aacute;lido."
						   data-validation-help="Ingrese Email v&aacute;lido." />
				</div><br>

				<div class="form-group">
					<label for="password">Contrase&ntilde;a:</label>
					<input type="password" 
						   name="password" 
						   id="password" 
						   placeholder="Contrase&ntilde;a"
						   data-validation="strength"
						   data-validation-strength="3"
						   data-validation-error-msg="Ingrese una Contrase&ntilde;a v&aacute;lida. S&oacute;lo se permiten letras."
						   data-validation-help="Ingrese Contrase&ntilde;a." />
				</div><br>

				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input type="text" 
						   name="nombre" 
						   id="nombre" 
						   placeholder="Nombre" 
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Nombre v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Nombre." />
				</div><br>

				<div class="form-group">
					<label for="ap_paterno">Apellido Paterno:</label>
					<input type="text" 
						   name="ap_paterno" 
						   id="ap_paterno" 
						   placeholder="Apellido Paterno" 
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Apellido Paterno v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Apellido Paterno." />
				</div><br>

				<div class="form-group">
					<label for="ap_materno">Apellido Materno:</label>
					<input type="text"
						   name="ap_materno" 
						   id="ap_materno" 
						   placeholder="Apellido Materno" 
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Apellido Materno v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Apellido Materno." />
				</div><br>

				<button type="submit">Registrar Usuario</button>
			</form>
		</div>

		<hr class="major" />

		<h2>Consulta</h2>
		<div class="container-scroll">
			<table>
				<tr>
					<th>ID</th>
					<th>Correo</th>
					<th>Nombre</th>
					<th>Ap Paterno</th>
					<th>Ap Materno</th>
					<th>Status</th>
					<th>Operaciones</th>
				</tr>
				<?php while($row = mysqli_fetch_array($result_usuarios)) {
					echo "<tr>";
					echo "<td>" . $row['ID_USUARIO'] . "</td>";
					echo "<td>" . $row['CORREO'] . "</td>";
					echo "<td>" . utf8_encode($row['NOMBRE']) . "</td>";
					echo "<td>" . utf8_encode($row['AP_PATERNO']) . "</td>";
					echo "<td>" . utf8_encode($row['AP_MATERNO']) . "</td>";
					echo "<td>" . ($row['STATUS'] == 1 ? 'Activo' : 'Inactivo') . "</td>";
					echo "<td><a href='javascript:void(0);' onclick='edit(".$row['ID_USUARIO'].");''>Editar</a></td>";
					echo "</tr>";
				} ?>
			</table>
		</div>

		<div id="user_edit" style="display: none;">
			<h2>Editar</h2>
			<form method="post" action="usuarios/update.php">
				<input type="hidden" name="edit_user_id" id="edit_user_id" placeholder="ID" />
				<div class="form-group">
					<label for="correo">Email:</label>
					<input type="text" 
						   name="edit_correo" 
						   id="edit_correo" 
						   placeholder="Email"
						   data-validation="email"
						   data-validation-error-msg="Ingrese un Email v&aacute;lido."
						   data-validation-help="Ingrese Email v&aacute;lido."  />
				</div><br>

				<div class="form-group">
					<label for="edit_password">Contrase&ntilde;a:</label>
					<input type="password" 
						   name="edit_password" 
						   id="edit_password" 
						   placeholder="Contrase&ntilde;a" />
				</div><br>

				<div class="form-group">
					<label for="edit_nombre">Nombre:</label>
					<input type="text" 
						   name="edit_nombre" 
						   id="edit_nombre" 
						   placeholder="Nombre"
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Nombre v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Nombre." />
				</div><br>

				<div class="form-group">
					<label for="edit_ap_paterno">Apellido Paterno:</label>
					<input type="text" 
						   name="edit_ap_paterno" 
						   id="edit_ap_paterno" 
						   placeholder="Apellido Paterno"
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Apellido Paterno v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Apellido Paterno." />
				</div><br>

				<div class="form-group">
					<label for="edit_ap_materno">Apellido Materno:</label>
					<input type="text" 
						   name="edit_ap_materno" 
						   id="edit_ap_materno" 
						   placeholder="Apellido Materno"
						   data-validation="custom" 
						   data-validation-regexp="^([a-zA-ZáéíóúÁÉÍÓÚ\s]{3,60})$"
						   data-validation-error-msg="Ingrese un Apellido Materno v&aacute;lido. S&oacute;lo se permiten min 3 letras."
						   data-validation-help="Ingrese Apellido Materno." />
				</div><br>

				<div class="form-group">
					<label for="edit_status">Status:</label>
					<select name="edit_status" id="edit_status">
						<option value="1">1 - ACTIVO</option>
						<option value="0">0 - INACTIVO</option>
					</select>
				</div><br>

				<button type="submit">Actualizar Usuario</button>
			</form>
		</div>
	</div>
</section>
<!-- Banner Bienvenida -->
		
<script>
	$.validate({
		lang: 'es',
		/*modules : 'security',
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
		}*/
	});
</script>
<?php require_once("footer.php"); ?>