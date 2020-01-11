<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}
?>

<?php require_once("header.php"); ?>

<?php
require_once("config/config.php");

// db connection config vars
$DATABASE_USER = DBUSER;
$DATABASE_PASS = DBPWD;
$DATABASE_NAME = DBNAME;
$DATABASE_HOST = DBHOST;

// Create connection
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID_USUARIO = $_SESSION['user_id'];
$p_password = $_POST['new_password'];

if ($p_password == '' || $p_password == null) {
	echo "Ingrese la contrase&ntilde;a nueva";
} else {
	$sql = "UPDATE USUARIO SET PASSWORD='".password_hash($p_password, PASSWORD_BCRYPT)."' WHERE ID_USUARIO=".$ID_USUARIO;

	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	unset($_SESSION['loggedin']);
	unset($_SESSION['user_id']);
	unset($_SESSION['user_rol']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_app']);
	unset($_SESSION['user_apm']);
	unset($_SESSION['user_id_departamento']);
}

echo '<script>location.replace("index.php")</script>';

$conn->close();
?>

<?php require_once("footer.php"); ?>