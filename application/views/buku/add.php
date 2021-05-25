<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                            Form Tambah Buku
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('BukuController') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['stok' => 0]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="idbuku">ID Buku</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('idbuku', $idbuku); ?>" name="idbuku" id="idbuku" type="text" class="form-control" placeholder="ID Buku...">
                        <?= form_error('idbuku', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="judul">Nama Buku</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('judul'); ?>" name="judul" id="judul" type="text" class="form-control" placeholder="Nama Buku...">
                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="idcategory">Kategori Buku</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="idcategory" id="idcategory" class="custom-select">
                                <option value="" selected disabled>Pilih Kategori Buku</option>
                                <?php foreach ($category as $j) : ?>
                                    <option <?= set_select('idcategory', $j['idcategory']) ?> value="<?= $j['idcategory'] ?>"><?= $j['category'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn" style="background-color: #315c9a; color: white;" href="<?= base_url('CategoryController/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('idcategory', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="penulis">Penulis</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('penulis'); ?>" name="penulis" id="penulis" type="text" class="form-control" placeholder="Penulis...">
                        <?= form_error('penulis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="hargabeli">Harga Beli/pcs</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('hargabeli'); ?>" name="hargabeli" id="hargabeli" type="text" class="form-control" placeholder="Harga Beli/pcs...">
                        <?= form_error('hargabeli', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="hargajual">Harga Jual/pcs</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('hargajual'); ?>" name="hargajual" id="hargajual" type="text" class="form-control" placeholder="Harga Jual/pcs...">
                        <?= form_error('hargajual', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn" style="background-color: #315c9a; color: white;">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</bu>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>