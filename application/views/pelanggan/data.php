<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                    Data Pelanggan
                </h4>
            </div>
            <div class="col-auto">
                <a type="button" data-toggle="modal" data-target="#TambahP" class="btn btn-sm btn-icon-split text-light" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Pelanggan
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100  nowrap" id="dataTable">
            <thead style="background-color:#6C7C94; color:white">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat Pelanggan</th>
                    <th>Email</th>
                    <th>Kota Asal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pelanggan as $p) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p['namapelanggan']; ?></td>
                        <td><?= $p['contactpelanggan']; ?></td>
                        <td><?= $p['alamatpelanggan']; ?></td>
                        <td><?= $p['emailpelanggan']; ?></td>
                        <td><?= $p['kotapelanggan']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-circle btn-sm text-light" data-toggle="modal" data-target="#Updatep<?= $p['idpelanggan'] ?>" title="Edit"><i class="fa fa-edit"></i></button>
                            <a type="button" class="btn btn-danger btn-circle btn-sm" type="button" href="<?php echo base_url() . 'PelangganController/delete/' . $p['idpelanggan'] ?>" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL EDIT DAN TAMBAH -->
<div class="modal fade" id="TambahP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Form Data Pelanggan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>PelangganController/add">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open(); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="namapelanggan">Nama Pelanggan</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                </div>
                                <input value="<?= set_value('namapelanggan'); ?>" name="namapelanggan" id="namapelanggan" type="text" class="form-control" placeholder="Nama Pelanggan...">
                            </div>
                            <?= form_error('namapelanggan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="contactpelanggan">Nomor Telepon</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                </div>
                                <input value="<?= set_value('contactpelanggan'); ?>" name="contactpelanggan" id="contactpelanggan" type="text" class="form-control" placeholder="Nomor Telepon...">
                            </div>
                            <?= form_error('contactpelanggan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="alamatpelanggan">Alamat Pelanggan</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
                                </div>
                                <textarea name="alamatpelanggan" id="alamatpelanggan" class="form-control" rows="4" placeholder="Alamat Pelanggan..."><?= set_value('alamatpelanggan'); ?></textarea>
                            </div>
                            <?= form_error('alamatpelanggan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="emailpelanggan">Email Pelanggan</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                </div>
                                <textarea name="emailpelanggan" id="emailpelanggan" class="form-control" rows="4" placeholder="Email Pelanggan..."><?= set_value('emailpelanggan'); ?></textarea>
                            </div>
                            <?= form_error('emailpelanggan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="kotapelanggan">Kota Pelanggan</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-map"></i></span>
                                </div>
                                <textarea name="kotapelanggan" id="kotapelanggan" class="form-control" rows="4" placeholder="Kota Pelanggan..."><?= set_value('kotapelanggan'); ?></textarea>
                            </div>
                            <?= form_error('kotapelanggan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn" style="background-color: #315c9a; color: white;">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- EDIT DATA -->
<?php foreach ($pelanggan as $p) { ?>
    <div class="modal fade" id="Updatep<?= $p['idpelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Data Pelanggan</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() . 'PelangganController/edit/' . $p['idpelanggan'] ?>">
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= form_open('', [], ['idpelanggan' => $p['idpelanggan']]); ?>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="namapelanggan">Nama Pelanggan</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                    </div>
                                    <input value="<?= set_value('namapelanggan', $p['namapelanggan']); ?>" name="namapelanggan" id="namapelanggan" type="text" class="form-control" placeholder="Nama Pelanggan...">
                                </div>
                                <?= form_error('namapelanggan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="contactpelanggan">Nomor Telepon</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                    </div>
                                    <input value="<?= set_value('contactpelanggan', $p['contactpelanggan']); ?>" name="contactpelanggan" id="contactpelanggan" type="text" class="form-control" placeholder="Nomor Telepon...">
                                </div>
                                <?= form_error('contactpelanggan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="alamatpelanggan">Alamat Pelanggan</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
                                    </div>
                                    <textarea name="alamatpelanggan" id="alamatpelanggan" class="form-control" rows="4" placeholder="Alamat Pelanggan..."><?= set_value('alamatpelanggan', $p['alamatpelanggan']); ?></textarea>
                                </div>
                                <?= form_error('alamatpelanggan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="emailpelanggan">Email Pelanggan</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                    </div>
                                    <input value="<?= set_value('emailpelanggan', $p['emailpelanggan']); ?>" name="emailpelanggan" id="emailpelanggan" class="form-control" rows="4" placeholder="Email Pelanggan...">
                                </div>
                                <?= form_error('emailpelanggan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="kotapelanggan">Kota Pelanggan</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-map"></i></span>
                                    </div>
                                    <input value="<?= set_value('kotapelanggan', $p['kotapelanggan']); ?>" name="kotapelanggan" id="kotapelanggan" class="form-control" rows="4" placeholder="Kota Pelanggan...">
                                </div>
                                <?= form_error('kotapelanggan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn" style="background-color: #315c9a; color: white;">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>