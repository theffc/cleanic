<?php
	require_once(dirname(dirname(dirname(__FILE__))) . '/config/constants.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php require_once(__TEMPLATES__ . '/components/styles/styles-0001.php'); ?>
	</head>

	<body>
		<?php require_once(__TEMPLATES__ . '/components/header/header-0001.php'); ?>

		<?php require_once(__TEMPLATES__ . '/components/main/home.php'); ?>

		<?php require_once(__TEMPLATES__ . '/components/footer/footer-0001.php'); ?>

		<?php require_once(__TEMPLATES__ . '/components/scripts/scripts-0001.php'); ?>
	</body>
</html>