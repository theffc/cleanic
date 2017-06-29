<?php
	session_start();
?>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/cleanic/public/home">Cleanic</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active" data-nav-holder-paginator>
					<a href="#home" data-nav-paginator>Home</a>
				</li>
				<li class="" data-nav-holder-paginator>
					<a href="#gallery" data-nav-paginator>Galeria</a>
				</li>
				<li class="" data-nav-holder-paginator>
					<a href="#contact" data-nav-paginator>Contato</a>
				</li>
				<li class="" data-nav-holder-paginator>
					<a href="#scheduling" data-schedule-add-button data-nav-paginator>Agendamento</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if (!isset($_SESSION['user'])) { ?>
					<li class="active">
						<a data-toggle="modal" data-target="#login-modal" href="#login" data-login-button>Login</a>
					</li>
				<?php } else { ?>
					<li class="active">
						<a href="/cleanic/public/admin/">Ir para o Admin</a>
					</li>				
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>