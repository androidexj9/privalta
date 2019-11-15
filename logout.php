<?php
session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['user_id']);
unset($_SESSION['user_rol']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['user_app']);
unset($_SESSION['user_apm']);
unset($_SESSION['user_id_departamento']);
?>

<?php require_once("header.php"); ?>

<?php
echo '¡Tu sesi&oacute;n ha finalizado con &eacute;xito!';
echo '<script>location.replace("index.php")</script>';
?>

<?php require_once("footer.php"); ?>