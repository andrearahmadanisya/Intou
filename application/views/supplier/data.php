<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold" style="color: #315c9a;">
                    Data Supplier
                </h4>
            </div>
            <div class="col-auto">
                <a type="button" data-toggle="modal" data-target="#TambahS" class="btn btn-sm btn-icon-split text-light" style="background-color: #315c9a; color: white;">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Supplier
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
                    <th>Alamat Supplier</th>
                    <th>Email</th>
                    <th>Kota Asal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($supplier as $sp) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $sp['namasupplier']; ?></td>
                        <td><?= $sp['contactsupplier']; ?></td>
                        <td><?= $sp['alamatsupplier']; ?></td>
                        <td><?= $sp['emailsupplier']; ?></td>
                        <td><?= $sp['kotasupplier']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-circle btn-sm text-light" data-toggle="modal" data-target="#Updatesp<?= $sp['idsupplier'] ?>" title="Edit"><i class="fa fa-edit"></i></button>
                            <a type="button" class="btn btn-danger btn-circle btn-sm" type="button" href="<?php echo base_url() . 'SupplierController/delete/' . $sp['idsupplier'] ?>" onClick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL EDIT DAN TAMBAH -->
<div class="modal fade" id="TambahS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Form Data Supplier</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>SupplierController/add">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open(); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="namasupplier">Nama Supplier</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                </div>
                                <input value="<?= set_value('namasupplier'); ?>" name="namasupplier" id="namasupplier" type="text" class="form-control" placeholder="Nama Supplier...">
                            </div>
                            <?= form_error('namasupplier', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="contactsupplier">Nomor Telepon</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                </div>
                                <input value="<?= set_value('contactsupplier'); ?>" name="contactsupplier" id="contactsupplier" type="text" class="form-control" placeholder="Nomor Telepon...">
                            </div>
                            <?= form_error('contactsupplier', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="alamatsupplier">Alamat Supplier</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
                                </div>
                                <textarea name="alamatsupplier" id="alamatsupplier" class="form-control" rows="4" placeholder="Alamat Supplier..."><?= set_value('alamatsupplier'); ?></textarea>
                            </div>
                            <?= form_error('alamatsupplier', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="emailsupplier">Email supplier</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                </div>
                                <textarea name="emailsupplier" id="emailsupplier" class="form-control" rows="4" placeholder="Email supplier..."><?= set_value('emailsupplier'); ?></textarea>
                            </div>
                            <?= form_error('emailsupplier', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="kotasupplier">Kota supplier</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-map"></i></span>
                                </div>
                                <textarea name="kotasupplier" id="kotasupplier" class="form-control" rows="4" placeholder="Kota supplier..."><?= set_value('kotasupplier'); ?></textarea>
                            </div>
                            <?= form_error('kotasupplier', '<small class="text-danger">', '</small>'); ?>
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
<?php foreach ($supplier as $sp) { ?>
    <div class="modal fade" id="Updatesp<?= $sp['idsupplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Data Supplier</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url() . 'SupplierController/edit/' . $sp['idsupplier'] ?>">
                        <?= $this->session->flashdata('pesan'); ?>
                        <?= form_open('', [], ['idsupplier' => $sp['idsupplier']]); ?>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="namasupplier">Nama Supplier</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                    </div>
                                    <input value="<?= set_value('namasupplier', $sp['namasupplier']); ?>" name="namasupplier" id="namasupplier" type="text" class="form-control" placeholder="Nama Supplier...">
                                </div>
                                <?= form_error('namasupplier', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="contactsupplier">Nomor Telepon</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                    </div>
                                    <input value="<?= set_value('contactsupplier', $sp['contactsupplier']); ?>" name="contactsupplier" id="contactsupplier" type="text" class="form-control" placeholder="Nomor Telepon...">
                                </div>
                                <?= form_error('contactsupplier', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="alamatsupplier">Alamat Supplier</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-home"></i></span>
                                    </div>
                                    <textarea name="alamatsupplier" id="alamatsupplier" class="form-control" rows="4" placeholder="Alamat Supplier..."><?= set_value('alamatsupplier', $sp['alamatsupplier']); ?></textarea>
                                </div>
                                <?= form_error('alamatsupplier', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="emailsupplier">Email supplier</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                    </div>
                                    <input value="<?= set_value('emailsupplier', $sp['emailsupplier']); ?>" name="emailsupplier" id="emailsupplier" class="form-control" rows="4" placeholder="Email supplier...">
                                </div>
                                <?= form_error('emailsupplier', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="kotasupplier">Kota supplier</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-map"></i></span>
                                    </div>
                                    <input value="<?= set_value('kotasupplier', $sp['kotasupplier']); ?>" name="kotasupplier" id="kotasupplier" class="form-control" rows="4" placeholder="Kota supplier...">
                                </div>
                                <?= form_error('kotasupplier', '<small class="text-danger">', '</small>'); ?>
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