<?php
	require_once(dirname(dirname(dirname(__FILE__))) . '/config/constants.php');

	session_start();
	if (isset($_SESSION['user'])) {
		require_once("admin-home.php");
	} else {
		require_once("home.php");
		exit;
	}
?>

