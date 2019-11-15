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

$ID_INGRESO = $_GET["ingreso_id"];

$result_ingreso = mysqli_query($conn, "SELECT * FROM INGRESO WHERE ID_INGRESO=". $ID_INGRESO);
$ingreso = mysqli_fetch_assoc($result_ingreso);

header("Content-Type: application/json;charset=utf-8");

echo json_encode(array(
	'ID_INGRESO' => $ingreso['ID_INGRESO'],
	'ID_CAT_TIPO_INGRESO' => $ingreso['ID_CAT_TIPO_INGRESO'],
	'ID_DEPARTAMENTO' => $ingreso['ID_DEPARTAMENTO'],
	'MONTO_INGRESO' => $ingreso['MONTO_INGRESO'],
	'ANIO' => $ingreso['ANIO'],
	'MES' => $ingreso['MES'],
	'FECHA_REGISTRO' => $ingreso['FECHA_REGISTRO'],
	'FECHA_MODIFICACION' => $ingreso['FECHA_MODIFICACION'],
	'DOCUMENTO_SOPORTE' => $ingreso['DOCUMENTO_SOPORTE'],
	'COMENTARIOS' => $ingreso['COMENTARIOS'],
    'STATUS' => $ingreso['STATUS']
	)
);
exit;

?>