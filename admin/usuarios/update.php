<?php
session_start();

if (!isset($_SESSION['loggedin_admin'])) {
	header('Refresh: 2; URL = ../index.php');
}

require_once("../../config/config.php");

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

$p_user_id = $_POST['edit_user_id'];
$p_correo = $_POST['edit_correo'];
$p_nombre = utf8_decode($_POST['edit_nombre']);
$p_ap_paterno = utf8_decode($_POST['edit_ap_paterno']);
$p_ap_materno = utf8_decode($_POST['edit_ap_materno']);
$p_password = $_POST['edit_password'];
$p_status = $_POST['edit_status'];

header('Content-type: text/html;charset=utf-8');

if ($p_password == '' || $p_password == null) {
	$sql = "UPDATE USUARIO SET CORREO='".$p_correo."', NOMBRE='".$p_nombre."', AP_PATERNO='".$p_ap_paterno."', AP_MATERNO='".$p_ap_materno."', STATUS=".$p_status." WHERE ID_USUARIO=".$p_user_id;
} else {
	$sql = "UPDATE USUARIO SET CORREO='".$p_correo."', NOMBRE='".$p_nombre."', AP_PATERNO='".$p_ap_paterno."', AP_MATERNO='".$p_ap_materno."', PASSWORD='".password_hash($p_password, PASSWORD_BCRYPT)."', STATUS=".$p_status." WHERE ID_USUARIO=".$p_user_id;
}

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

//header('Refresh: 2; URL = ../admon_usuarios.php');
echo '<script>location.replace("../admon_usuarios.php")</script>';

$conn->close();

?>