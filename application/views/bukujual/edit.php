<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                            Form Edit Transaksi Penjualan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('TPenjualanController') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['idpenjualan' => $transaksipjl['idpenjualan']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="idpenjualan">ID Transaksi Penjualan</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('idpenjualan', $transaksipjl['idpenjualan']); ?>" type="text" readonly="readonly" class="form-control">
                        <?= form_error('idpenjualan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tanggal_keluar">Tanggal Keluar</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal_keluar', date('l, d-m-Y'), $transaksipjl['tanggal_keluar']); ?>" name="tanggal_keluar" id="tanggal_keluar" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal_keluar', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="idpelanggan">pelanggan</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="idpelanggan" id="idpelanggan" class="custom-select">
                                <option <?= set_value('idpelanggan', $transaksipjl['idpelanggan']); ?> value="<?= $transaksipjl['idpelanggan']; ?>"><?= $transaksipjl['idpelanggan'] ?></option>
                                <?php foreach ($pelanggan as $p) : ?>
                                    <option <?= set_select('idpelanggan', $p['idpelanggan']) ?> value="<?= $p['idpelanggan'] ?>"><?= $p['idpelanggan'] . ' | ' . $p['namapelanggan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn" style="background-color: #315c9a; color: white;" href="<?= base_url('PelangganController/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('idpelanggan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_buku">Buku</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="id_buku" id="id_buku" class="custom-select">
                                <option value="" selected disabled><?= $transaksipjl['id_buku'] ?></option>
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
                    <label class="col-md-4 text-md-right" for="qty">Jumlah Keluar</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input value="<?= set_value('qty', $transaksipjl['qty']); ?>" name="qty" id="qty" type="number" class="form-control" placeholder="Jumlah Masuk...">
                            <div class="input-group-append">
                                <span class="input-group-text">/pcs</span>
                            </div>
                        </div>
                        <?= form_error('qty', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="total_stok">Total Stok</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="total_stok" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="biayakirim">Biaya Kirim</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('biayakirim', $transaksipjl['biayakirim']); ?>" name="biayakirim" id="biayakirim" type="text" class="form-control" placeholder="Harga Beli/pcs...">
                        <?= form_error('biayakirim', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="hargatotal">Harga Total/pcs</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('hargatotal', $transaksipjl['hargatotal']); ?>" name="hargatotal" id="hargatotal" type="text" class="form-control" placeholder="Harga Jual/pcs...">
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