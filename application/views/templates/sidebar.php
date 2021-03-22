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
	<!-- Bootstrap JavaScript -->
	<script src="assets/jquery/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- MY CSS -->
	<!-- Menu Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/styles.css">

	<title><?php echo $judul ?></title>
</head>

<body>
	<div class="d-flex" id="wrapper">

		<!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><img src="assets/images/logo.png" id="logo" /></div>
			<div class="list-group list-group-flush">
				<a href="<?= base_url('HomeController'); ?>" class="list-group-item list-group-item-action bg-light">Home</a>
				<a href="<?= base_url('BukuController'); ?>" class="list-group-item list-group-item-action bg-light">Data Buku</a>
				<a href="<?= base_url('SupplierController'); ?>" class="list-group-item list-group-item-action bg-light">Data Supplier</a>
				<a href="<?= base_url('PelangganController'); ?>" class="list-group-item list-group-item-action bg-light">Data Pelanggan</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Transaksi</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Laporan</a>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- Konten -->
		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<button class="btn btn-primary" id="menu-toggle">Menu</button>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Karyawan
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
</body>