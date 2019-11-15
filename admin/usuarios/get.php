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

$USER_ID = $_GET["user_id"];

$result_usuario = mysqli_query($conn, "SELECT * FROM USUARIO WHERE ID_USUARIO=". $USER_ID ." AND ID_CAT_ROL IN (2,3,4)");
$usuario = mysqli_fetch_assoc($result_usuario);

header("Content-Type: application/json;charset=utf-8");

echo json_encode(array(
	'ID_USUARIO' => $usuario['ID_USUARIO'],
	'ID_CAT_ROL' => $usuario['ID_CAT_ROL'],
	'CORREO' => $usuario['CORREO'],
    'NOMBRE' => $usuario['NOMBRE'],
    'AP_PATERNO' => utf8_encode($usuario['AP_PATERNO']),
    'AP_MATERNO' => utf8_encode($usuario['AP_MATERNO']),
    'STATUS' => $usuario['STATUS']
	)
);
exit;

?>