<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}
?>

<?php require_once("header.php"); ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("config/config.php");

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

// Variables globales
$ID_USUARIO = $_SESSION['user_id'];
$ID_DEPARTAMENTO = $_SESSION['user_id_departamento'];
$YEAR = date('Y');
$MONTH = date('m');
$DAY = date('d');
$p_monto = $_POST['monto'];

$date_time = date('Y')."-".date('m')."-".date('d')." 00:00:00";

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

	$DOCUMENTO_SOPORTE = "public/documents/cuotas/CUOTA_".$ID_DEPARTAMENTO."-".$YEAR.$MONTH.".".$extension;

	if (move_uploaded_file($_FILES['file']['tmp_name'], $PATH.$DOCUMENTO_SOPORTE)) {		
		echo "El archivo ". basename($_FILES['file']['name']). " ha sido cargado.<br>";
		
        // 1 - PAGADO
        // 2 - PENDIENTE
        // 0 - NO PAGADO 	
        $insert_cuota = "INSERT INTO `CUOTAS` (`ID_CUOTA`, `ID_USUARIO`, `ID_DEPARTAMENTO`, `ANIO`, `MES`, `DIA`, `MONTO`, `FECHA_PAGO`, `FECHA_MODIF`, `DOCUMENTO_SOPORTE`, `COMENTARIOS`, `STATUS`) VALUES (NULL, '".$ID_USUARIO."', '".$ID_DEPARTAMENTO."', '".$YEAR."', '".$MONTH."', '".$DAY."', '".$p_monto."', NOW(), NOW(), '".$DOCUMENTO_SOPORTE."', 'CUOTA MTTO PLATAFORMA', '2')";

		if (mysqli_query($conn, $insert_cuota)) {
			echo "New record created successfully.<br>";
		} else {
			echo "Error: <br>" . mysqli_error($conn);
		}

		// 0 - PENDIENTE 
		// 1 - VALIDADO
		$insert_ingreso = "INSERT INTO `INGRESO` (`ID_INGRESO`, `ID_CAT_TIPO_INGRESO`, `ID_DEPARTAMENTO`, `MONTO_INGRESO`, `ANIO`, `MES`, `FECHA_REGISTRO`, `FECHA_MODIFICACION`, `DOCUMENTO_SOPORTE`, `COMENTARIOS`, `STATUS`) VALUES (NULL, '1', '".$ID_DEPARTAMENTO."', '".$p_monto."', '".$YEAR."', '".$MONTH."', NOW(), NOW(), '".$DOCUMENTO_SOPORTE."', 'CUOTA MTTO PLATAFORMA', '0')";

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

echo '<script>location.replace("mi_cuenta.php")</script>';
?>

<?php require_once("footer.php"); ?>