<div class="container">
	<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Buku <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif; ?>



	<div class="row mt-5">
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
					<tr><?php foreach ($buku as $bk) : ?>
							<td class="text-center"><?= $bk['judul']; ?></td>
							<td class="text-center"><?= $bk['category']; ?></td>
							<td class="text-center"><?= $bk['penulis']; ?></td>
							<td class="text-center"><?= $bk['tglmasuk']; ?></td>
							<td class="text-center"><?= $bk['hargajual']; ?></td>
							<td class="text-center"><?= $bk['hargabeli']; ?></td>
							<td class="text-center">
								<a class="badge badge-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?>hapus</a>
								<a class="badge badge-success float-center" ?>ubah</a>
							</td>
					</tr><?php endforeach ?>
				</tbody>
			</table>
			<div class="row mt-3">
				<div class="col md-6 text-center mt-5">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit1">TAMBAH </button>
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
