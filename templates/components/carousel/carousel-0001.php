<?php
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config/constants.php');
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		<li data-target="#myCarousel" data-slide-to="2" class=""></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<?php require_once(__TEMPLATES__ . '/components/slide/slide-0001.php'); ?>

		<?php require_once(__TEMPLATES__ . '/components/slide/slide-0002.php'); ?>

		<?php require_once(__TEMPLATES__ . '/components/slide/slide-0003.php'); ?>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>