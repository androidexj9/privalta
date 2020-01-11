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

$ID_DEPARTAMENTO = $_GET["id_departamento"];

$result_departamento = mysqli_query($conn, "SELECT * FROM CAT_DEPARTAMENTO WHERE ID_DEPARTAMENTO=". $ID_DEPARTAMENTO);
$departamento = mysqli_fetch_assoc($result_departamento);

header("Content-Type: application/json;charset=utf-8");

echo json_encode(array(
	'ID_DEPARTAMENTO' => $departamento['ID_DEPARTAMENTO'],
	'ID_USUARIO' => $departamento['ID_USUARIO'],
	'FECHA_ENTREGA' => $departamento['FECHA_ENTREGA'] == null ? '' : $departamento['FECHA_ENTREGA'],
    'STATUS' => $departamento['STATUS']
	)
);
exit;
?>