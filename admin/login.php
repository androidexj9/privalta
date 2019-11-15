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

if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
	header('Refresh: 2; URL = index.php');
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['correo'], $_POST['password'])) {
	// Could not get the data that should have been sent.
	echo 'Por favor ingrese usuario y contrase&ntilde;a!';
	header('Refresh: 2; URL = index.php');
}
//echo "correo->" . $_POST['correo']."<br>";
?>
<?php require_once("header.php"); ?>
<?php
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare("SELECT `ID_USUARIO`, `ID_CAT_ROL`, `CORREO`, `NOMBRE`, `AP_PATERNO`, `AP_MATERNO`, `PASSWORD` FROM `USUARIO` WHERE `CORREO` = ? AND `ID_CAT_ROL` = ? AND `STATUS` = ?")) {

	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$p_correo = $_POST['correo'];
	$p_rol = 1;
	$p_status = 1;
	$stmt->bind_param('sii', $p_correo, $p_rol, $p_status);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}
//echo "rows->".$stmt->num_rows."<br>";

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $id_cat_rol, $correo, $nombre, $ap_paterno, $ap_materno, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		//session_regenerate_id();
		$_SESSION['loggedin_admin'] = TRUE;
		$_SESSION['admin_user_id'] = $id;
		$_SESSION['admin_user_rol'] = $id_cat_rol;
		$_SESSION['admin_user_email'] = $correo;
		$_SESSION['admin_user_name'] = $nombre;
		$_SESSION['admin_user_app'] = $ap_paterno;
		$_SESSION['admin_user_apm'] = $ap_materno;

		echo 'Bienvenid@: ' . $_SESSION['admin_user_name'] . '!';
	} else {
		echo 'Password incorrecto!';
	}
} else {
	echo 'Usuario Inactivo / Correo incorrecto!';
}

//header('Refresh: 2; URL = index.php');
echo '<script>location.replace("index.php")</script>';

$stmt->close();
?>
<?php require_once("footer.php"); ?>