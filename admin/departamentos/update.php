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

$p_id_departamento = $_POST['edit_id_departamento'];
$p_id_usuario = $_POST['edit_id_usuario'];
$p_fecha_entrega = $_POST['edit_fecha_entrega'];
//$p_fecha_entrega = DateTime::createFromFormat('date-time-format-from-datepicker',$_POST['edit_fecha_entrega'])->format('Y-m-d');
$p_status = $_POST['edit_status'];

header('Content-type: text/html;charset=utf-8');

$sql = "UPDATE CAT_DEPARTAMENTO SET ID_USUARIO='".$p_id_usuario."', FECHA_ENTREGA='".$p_fecha_entrega."', STATUS='".$p_status."' WHERE ID_DEPARTAMENTO=".$p_id_departamento;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo '<script>location.replace("../admon_departamentos.php")</script>';

$conn->close();
?>