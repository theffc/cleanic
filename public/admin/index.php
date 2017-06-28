<?php 
	session_start();

	require_once(dirname(dirname(dirname(__FILE__))) . '/config/constants.php');

	if (isset($_SESSION['user'])) {
		require_once(__TEMPLATES__ . '/pages/admin.php');
	} else {
		require_once(__TEMPLATES__ . '/pages/home.php');
		exit;
	}
?>