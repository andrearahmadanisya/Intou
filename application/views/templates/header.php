<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- MY CSS -->

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/styles.css">

	<title><?php echo $judul ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand">IntoU</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="<?= base_url('HomeController'); ?>">Home</a>
					<a class="nav-item nav-link" href="<?= base_url('BukuController'); ?>">Data Buku</a>
				</div>
			</div>
			<div class="text-right" class="collapse navbar-collapse">
				<?php if (isset($user['fullname'])) { ?>
					<a class="btn navbar-dark my-2 my-sm-0" href="<?= base_url('HomeController/logout'); ?>">Logout</a>
				<?php } else { ?>
					<a class="btn navbar-dark my-2 my-sm-0" href="<?= base_url('LoginController'); ?>">Login</a>
				<?php } ?>
			</div>
		</div>
	</nav>
