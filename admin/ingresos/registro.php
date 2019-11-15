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
$PATH = PATH;

// Create connection
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Params
$p_id_cat_tipo_ingreso = $_POST['id_cat_tipo_ingreso'];
$p_id_departamento = $_POST['id_departamento'];
$p_monto_ingreso = $_POST['monto_ingreso'];
$p_fecha_registro = $_POST['fecha_registro'];
$YEAR = substr($p_fecha_registro,0,4); // 2019-11-12
$MONTH = substr($p_fecha_registro,5,2); // 2019-11-12
$p_comentarios = $_POST['comentarios'];
$p_status= $_POST['status'];

// Insertar Archivo
$file_type = $_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

	if ($file_type=="application/pdf") {
		$extension = "pdf";
	} else if ($file_type=="image/jpeg") {
		$extension = "jpg";
	} else {
		$extension = "png";
	}

	$DOCUMENTO_SOPORTE = "public/documents/ingresos/".$p_id_cat_tipo_ingreso."_".$p_id_departamento."-".$YEAR.$MONTH.".".$extension;

	if (move_uploaded_file($_FILES['file']['tmp_name'], $PATH.$DOCUMENTO_SOPORTE)) {		
		echo "El archivo ". basename($_FILES['file']['name']). " ha sido cargado.<br>";

		// 0 - PENDIENTE 
		// 1 - VALIDADO
		$insert_ingreso = "INSERT INTO `INGRESO` (`ID_INGRESO`, `ID_CAT_TIPO_INGRESO`, `ID_DEPARTAMENTO`, `MONTO_INGRESO`, `ANIO`, `MES`, `FECHA_REGISTRO`, `FECHA_MODIFICACION`, `DOCUMENTO_SOPORTE`, `COMENTARIOS`, `STATUS`) VALUES (NULL, '".$p_id_cat_tipo_ingreso."', '".$p_id_departamento."', '".$p_monto_ingreso."', '".$YEAR."', '".$MONTH."', '".$p_fecha_registro."', '".$p_fecha_registro."', '".$DOCUMENTO_SOPORTE."', '".$p_comentarios."', '".$p_status."')";

		if (mysqli_query($conn, $insert_ingreso)) {
			echo "New record created successfully.<br>";
		} else {
			echo "Error: <br>" . mysqli_error($conn);
		}

		mysqli_close($conn);

	} else {
		echo "Problema al subir el archivo.";
	}
} else {
	echo "Solo se pueden registrar archivos de tipo PDF, JPG, PNG<br>";
}

header('Refresh: 2; URL = ../admon_ingresos.php');

?>