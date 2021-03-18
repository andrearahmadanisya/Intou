<!DOCTYPE html>
<html lang="en">

<head>
	<meta chabket="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Buku</title>
</head>

<body class="home">
	<div class="container">
		<div class="col">
			<h3 class="text-center">Daftar Buku</h3>
			<!-- <?php if (empty($buku)) : ?>
				<div class="alert alert-danger" role="alert">
					Data tidak ditemukan
				</div>
			<?php endif; ?> -->

			<table class="table mt-5">
				<thead>
					<tr>
						<th class="text-center" scope="col">judul</th>
						<th class="text-center" scope="col">category</th>
						<th class="text-center" scope="col">penulis</th>
						<th class="text-center" scope="col">tglmasuk</th>
						<th class="text-center" scope="col">hargajual</th>
						<th class="text-center" scope="col">hargabeli</th>
						<th class="text-center" scope="col">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<tr><?php foreach ($buku as $bk) { ?>
							<td class="text-center"><?= $bk['judul']; ?></td>
							<td class="text-center"><?= $bk['category']; ?></td>
							<td class="text-center"><?= $bk['penulis']; ?></td>
							<td class="text-center"><?= $bk['tglmasuk']; ?></td>
							<td class="text-center"><?= $bk['hargajual']; ?></td>
							<td class="text-center"><?= $bk['hargabeli']; ?></td>
							<td>
								<a type="button" class="btn btn-danger btn-sm" href="<?php echo base_url() . 'BukuController/delete/' . $bk['idbuku'] ?>" onClick="return confirm('Apakah Anda Yakin?')">Delete</a>

								<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#UpdateBK<?= $bk['idbuku'] ?>"> Update</a>
							</td>
					</tr><?php } ?>
				</tbody>
			</table>
			<div class="row mt-3">
				<div class="col md-6 text-center mt-5">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit1">TAMBAH</button>
				</div>
			</div>

		</div>
	</div>
	</div>

	<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<center>
						<h2>TAMBAH DATA BUKU</h2>
					</center>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url() ?>BukuController/addBuku">
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul" name="judul" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Category" name="category" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Penulis" name="penulis">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="tglmasuk" name="tglmasuk">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="hargajual" name="hargajual">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="hargabeli" name="hargabeli">
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
	<?php foreach ($buku as $bk) { ?>
		<div class="modal fade" id="UpdateBK<?= $bk['idbuku'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<center>
							<h2>EDIT DATA BUKU</h2>
						</center>
					</div>
					<div class="modal-body">
						<form method="POST" action="<?= base_url() . 'BukuController/update/' . $bk['idbuku'] ?>">
							<div class="form-group">
								<label for="formGroupExampleInput">Judul Buku</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul Buku" name="nama" value="<?= $bk['judul'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Category</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="category" name="category" value="<?= $bk['category'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Penulis</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Penulis" name="penulis" value="<?= $bk['penulis'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Tanggal Masuk</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tanggal Masuk" name="tglmasuk" value="<?= $bk['tglmasuk'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Harga Jual</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Jual" name="hargajual" value="<?= $bk['hargajual'] ?>" required>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput">Harga Belli</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Beli" name="hargabeli" value="<?= $bk['hargabeli'] ?>" required>
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
