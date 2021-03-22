<!DOCTYPE html>
<html lang="en">

<head>
	<meta chapget="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data pelanggan</title>
</head>

<body class="home">
	<div class="container">
		<div class="col">
			<h3 class="text-center">Daftar pelanggan</h3>
			<div class="container">
				<div class="navbar-form navbar-right">
					<form action="<?= site_url('PelangganController/SearchPelanggan') ?>" method="post" accept-charset="utf-8">
						<input type="text" name="keyword" class="form-control" placeholder="Search">
						<button type="submit" class="btn btn-success">cari</button>
					</form>
				</div>

				<table class="table mt-5">
					<thead>
						<tr>
							<th class="text-center" scope="col">Nama pelanggan</th>
							<th class="text-center" scope="col">Alamat pelanggan</th>
							<th class="text-center" scope="col">Contact pelanggan</th>
							<th class="text-center" scope="col">Email pelanggan</th>
							<th class="text-center" scope="col">Kota pelanggan</th>
							<th class="text-center" scope="col">AKSI</th>

						</tr>
					</thead>
					<tbody>
						<tr><?php foreach ($pelanggan as $pg) { ?>
								<td class="text-center"><?= $pg['namapelanggan']; ?></td>
								<td class="text-center"><?= $pg['alamatpelanggan']; ?></td>
								<td class="text-center"><?= $pg['contactpelanggan']; ?></td>
								<td class="text-center"><?= $pg['emailpelanggan']; ?></td>
								<td class="text-center"><?= $pg['kotapelanggan']; ?></td>
								<td>
									<a type="button" class="btn btn-danger btn-sm" href="<?php echo base_url() . 'PelangganController/delete/' . $pg['idpelanggan'] ?>" onClick="return confirm('Apakah Anda Yakin?')">Delete</a>

									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Updatepg<?= $pg['idpelanggan'] ?>"> Update</a>
								</td>
						</tr><?php } ?>
					</tbody>
				</table>
				<div class="row mt-3">
					<div class="col md-6 text-center mt-5">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahP">TAMBAH</button>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="TambahP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<center>
						<h2>TAMBAH DATA pelanggan</h2>
					</center>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url() ?>PelangganController/addPelanggan">
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama pelanggan" name="namapelanggan" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat pelanggan" name="alamatpelanggan" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Contact pelanggan" name="contactpelanggan">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email pelanggan" name="emailpelanggan">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Kota pelanggan" name="kotapelanggan">
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php foreach ($pelanggan as $pg) { ?>
		<div class="modal fade" id="Updatepg<?= $pg['idpelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<center>
							<h2>EDIT DATA pelanggan</h2>
						</center>
					</div>
					<div class="modal-body">
						<form method="POST" action="<?= base_url() . 'PelangganController/update/' . $pg['idpelanggan'] ?>">
							<div class="form-group">
								<label for="formGroupExampleInput">Nama pelanggan</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama pelanggan" name="namapelanggan" value="<?= $pg['namapelanggan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Alamat pelanggan</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat pelanggan" name="alamatpelanggan" value="<?= $pg['alamatpelanggan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Contact pelanggan</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact pelanggan" name="contactpelanggan" value="<?= $pg['contactpelanggan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Email pelanggan</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="TEmail pelanggan" name="emailpelanggan" value="<?= $pg['emailpelanggan'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Kota pelanggan</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kota pelanggan" name="kotapelanggan" value="<?= $pg['kotapelanggan'] ?>" required>
							</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</body>

</html>