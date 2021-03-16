<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header text-center">
					<center>
						<h2>TAMBAH DATA Buku</h2>
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
</div>
