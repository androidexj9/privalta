<?php
session_start();

unset($_SESSION['loggedin_admin']);
unset($_SESSION['admin_user_id']);
unset($_SESSION['admin_user_rol']);
unset($_SESSION['admin_user_email']);
unset($_SESSION['admin_user_name']);
unset($_SESSION['admin_user_app']);
unset($_SESSION['admin_user_apm']);
?>

<?php require_once("header.php"); ?>

<?php
echo '¡Tu sesi&oacute;n ha finalizado con &eacute;xito!';
echo '<script>location.replace("index.php")</script>';
?>

<?php require_once("footer.php"); ?>