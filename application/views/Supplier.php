<!DOCTYPE html>
<html lang="en">

<head>
	<meta chaspet="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Supplier</title>
</head>

<body class="home">
	<div class="container">
		<div class="col">
			<h3 class="text-center">Daftar Supplier</h3>
			<div class="navbar-form navbar-right">
				<form action="<?= site_url('SupplierController/SearchSupplier') ?>" method="post" accept-charset="utf-8">
					<input type="text" name="keyword" class="form-control" placeholder="Search">
					<button type="submit" class="btn btn-success">cari</button>
				</form>
			</div>
			<table class="table mt-5">
				<thead>
					<tr>
						<th class="text-center" scope="col">Nama Supplier</th>
						<th class="text-center" scope="col">Alamat Supplier</th>
						<th class="text-center" scope="col">Contact Supplier</th>
						<th class="text-center" scope="col">Email Supplier</th>
						<th class="text-center" scope="col">Kota Supplier</th>
						<th class="text-center" scope="col">AKSI</th>

					</tr>
				</thead>
				<tbody>
					<tr><?php foreach ($supplier as $sp) { ?>
							<td class="text-center"><?= $sp['namasupplier']; ?></td>
							<td class="text-center"><?= $sp['alamatsupplier']; ?></td>
							<td class="text-center"><?= $sp['contactsupplier']; ?></td>
							<td class="text-center"><?= $sp['emailsupplier']; ?></td>
							<td class="text-center"><?= $sp['kotasupplier']; ?></td>
							<td>
								<a type="button" class="btn btn-danger btn-sm" href="<?php echo base_url() . 'SupplierController/delete/' . $sp['idsupplier'] ?>" onClick="return confirm('Apakah Anda Yakin?')">Delete</a>

								<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Updatesp<?= $sp['idsupplier'] ?>"> Update</a>
							</td>
					</tr><?php } ?>
				</tbody>
			</table>
			<div class="row mt-3">
				<div class="col md-6 text-center mt-5">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahS">TAMBAH</button>
				</div>
			</div>

		</div>
	</div>
	</div>

	<div class="modal fade" id="TambahS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<center>
						<h2>TAMBAH DATA SUPPLIER</h2>
					</center>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url() ?>SupplierController/addSupplier">
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Supplier" name="namasupplier" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat Supplier" name="alamatsupplier" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Contact Supplier" name="contactsupplier">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Email Supplier" name="emailsupplier">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Kota Supplier" name="kotasupplier">
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
	<?php foreach ($supplier as $sp) { ?>
		<div class="modal fade" id="Updatesp<?= $sp['idsupplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<center>
							<h2>EDIT DATA SUPPLIER</h2>
						</center>
					</div>
					<div class="modal-body">
						<form method="POST" action="<?= base_url() . 'SupplierController/update/' . $sp['idsupplier'] ?>">
							<div class="form-group">
								<label for="formGroupExampleInput">Nama Supplier</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Supplier" name="namasupplier" value="<?= $sp['namasupplier'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Alamat Supplier</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat Supplier" name="alamatsupplier" value="<?= $sp['alamatsupplier'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Contact Supplier</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Supplier" name="contactsupplier" value="<?= $sp['contactsupplier'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Email Supplier</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="TEmail Supplier" name="emailsupplier" value="<?= $sp['emailsupplier'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Kota Supplier</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kota Supplier" name="kotasupplier" value="<?= $sp['kotasupplier'] ?>" required>
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