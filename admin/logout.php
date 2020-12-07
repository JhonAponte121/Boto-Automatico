<?php
	session_start();
	$_SESSION = [];
	session_destroy();
	header('location:/Boto-Automatico/index.php');
?>