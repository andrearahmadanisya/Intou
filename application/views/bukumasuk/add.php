<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                            Form Input Buku Masuk
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('TBukuMasukController') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['idtransaksi' => $idtransaksi]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="idtransaksi">ID Transaksi buku Masuk</label>
                    <div class="col-md-4">
                        <input value="<?= $idtransaksi; ?>" type="text" readonly="readonly" class="form-control">
                        <?= form_error('idtransaksi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tanggal_masuk">Tanggal Masuk</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal_masuk', date('l, d-m-Y')); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="idsupplier">Supplier</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="idsupplier" id="idsupplier" class="custom-select">
                                <option value="" selected disabled>Pilih Supplier</option>
                                <?php foreach ($supplier as $s) : ?>
                                    <option <?= set_select('idsupplier', $s['idsupplier']) ?> value="<?= $s['idsupplier'] ?>"><?= $s['namasupplier'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn" style="background-color: #315c9a; color: white;" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('idsupplier', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_buku">Buku</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="id_buku" id="id_buku" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option <?= $this->uri->segment(3) == $b['idbuku'] ? 'selected' : '';  ?> <?= set_select('id_buku', $b['idbuku']) ?> value="<?= $b['idbuku'] ?>"><?= $b['idbuku'] . ' | ' . $b['judul'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn" style="background-color: #315c9a; color: white;" href="<?= base_url('BukuController/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('id_buku', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="stok">Stok</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="stok" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="totalmasuk">Jumlah Masuk</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input value="<?= set_value('totalmasuk'); ?>" name="totalmasuk" id="totalmasuk" type="number" class="form-control" placeholder="Jumlah Masuk...">
                            <div class="input-group-append">
                                <span class="input-group-text">/pcs</span>
                            </div>
                        </div>
                        <?= form_error('totalmasuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="total_stok">Total Stok</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="total_stok" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="hargapcs">Harga /pcs</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="hargapcs" id="hargapcs" class="custom-select">
                                <option value="" selected disabled>Harga Buku/pcs</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option <?= $this->uri->segment(3) == $b['hargabeli'] ? 'selected' : '';  ?> <?= set_select('hargapcs', $b['hargabeli']) ?> value="<?= $b['hargabeli'] ?>"><?= $b['idbuku'] . ' | ' . $b['hargabeli'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('hargapcs', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="hargatotal">Harga Total/pcs</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('hargatotal'); ?>" name="hargatotal" id="hargatotal" type="text" class="form-control" placeholder="Harga Jual/pcs...">
                        <?= form_error('hargatotal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn" style="background-color: #315c9a; color: white;">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
