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

// Params
$p_correo = $_POST['correo'];
$p_nombre = utf8_decode($_POST['nombre']);
$p_ap_paterno = utf8_decode($_POST['ap_paterno']);
$p_ap_materno = utf8_decode($_POST['ap_materno']);
$p_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insertar Registro
/*$stmt = $conn->prepare("INSERT INTO `USUARIO` (`ID_USUARIO`, `ID_CAT_ROL`, `CORREO`, `NOMBRE`, `AP_PATERNO`, `AP_MATERNO`, `PASSWORD`, `STATUS`) VALUES ('', 2, ?, ?, ?, ?, ?, 0)");
$stmt->bind_param('sssss', $p_correo, $p_nombre, $p_ap_paterno, $p_ap_materno, $p_password);
$stmt->execute();*/

$sql = "INSERT INTO `USUARIO` (`ID_USUARIO`, `ID_CAT_ROL`, `CORREO`, `NOMBRE`, `AP_PATERNO`, `AP_MATERNO`, `PASSWORD`, `STATUS`) VALUES (NULL, '2', '".$p_correo."', '".$p_nombre."', '".$p_ap_paterno."', '".$p_ap_materno."', '".$p_password."', '0')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error on insert record: " . $conn->error;
}

//header('Refresh: 2; URL = ../admon_usuarios.php');
echo '<script>location.replace("../admon_usuarios.php")</script>';

$conn->close();

?>